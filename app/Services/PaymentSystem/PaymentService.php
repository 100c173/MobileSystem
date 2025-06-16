<?php

namespace App\Services\PaymentSystem;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Transfer;

class PaymentService
{
    public function createCheckout($user)
    {
        $cartItems = CartItem::with(['product', 'agent'])->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            throw new \Exception('Cart is empty');
        }

        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $totalAmount += $item->product->price * $item->quantity;
        }

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $totalAmount,
                'status' => 'pending',
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'agent_id' => $item->agent_id,
                    'product_id' => $item->product_id,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->product->price * $item->quantity,
                ]);
            }

            Stripe::setApiKey(config('stripe.secret'));

            $paymentIntent = PaymentIntent::create([
                'amount' => intval($totalAmount * 100),
                'currency' => 'usd',
                'payment_method_types' => ['card'],
                'metadata' => [
                    'order_id' => $order->id,
                    'user_id' => $user->id,
                ],
            ]);

            DB::commit();

            return [
                'client_secret' => $paymentIntent->client_secret,
                'order_id' => $order->id,
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function confirmPayment($user, $paymentIntentId)
    {
        Stripe::setApiKey(config('stripe.secret'));

        $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

        if ($paymentIntent->status !== 'succeeded') {
            throw new \Exception('Payment not successful yet');
        }

        $orderId = $paymentIntent->metadata->order_id ?? null;
        if (!$orderId) {
            throw new \Exception('Order ID not found in PaymentIntent metadata');
        }

        $order = Order::with('orderItems.agent')->find($orderId);

        if (!$order || $order->status === 'completed') {
            throw new \Exception('Order not found or already completed');
        }

        DB::beginTransaction();

        try {
            $order->status = 'completed';
            $order->payment_intent_id = $paymentIntentId;
            $order->save();

            $agentsAmounts = [];

            foreach ($order->orderItems as $item) {
                if (!isset($agentsAmounts[$item->agent_id])) {
                    $agentsAmounts[$item->agent_id] = 0;
                }
                $agentsAmounts[$item->agent_id] += $item->subtotal;
            }

            foreach ($agentsAmounts as $agentId => $amount) {
                $agent = $order->orderItems->firstWhere('agent_id', $agentId)->agent;

                if (!$agent || !$agent->stripe_account_id) {
                    continue;
                }

                $agentAmountCents = intval($amount * 0.90 * 100);

                Transfer::create([
                    'amount' => $agentAmountCents,
                    'currency' => 'usd',
                    'destination' => $agent->stripe_account_id,
                    'transfer_group' => 'order_' . $order->id,
                ]);
            }

            CartItem::where('user_id', $user->id)->delete();

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
