<?php

namespace App\Http\Controllers\PaymentSystem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\PaymentSystem\PaymentService;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function checkout(Request $request)
    {
        try {
            $user = Auth::user();
            $result = $this->paymentService->createCheckout($user);

            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create order: ' . $e->getMessage()], 500);
        }
    }

    public function confirmPayment(Request $request)
    {
        $user = Auth::user();
        $paymentIntentId = $request->input('payment_intent_id');

        if (!$paymentIntentId) {
            return response()->json(['message' => 'payment_intent_id is required'], 400);
        }

        try {
            $this->paymentService->confirmPayment($user, $paymentIntentId);

            return response()->json(['message' => 'Payment confirmed and transfers completed']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error confirming payment: ' . $e->getMessage()], 500);
        }
    }

    public function success()
    {
        return redirect()->back()->with('success', 'The payment process was successfully completed.');
    }
}
