<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Services\customer\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Stripe\Stripe;
use Stripe\PaymentIntent;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    // Display cart items
    public function index()
    {
        $user = Auth::user();
        $cartItems = $user->cartItems()->with('product', 'agent')->get();

        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }

        $clientSecret = null;

        if ($total > 0) {
            Stripe::setApiKey(config('stripe.secret'));

            $paymentIntent = PaymentIntent::create([
                'amount' => (int) ($total * 100),
                'currency' => 'usd',
                'metadata' => [
                    'user_id' => $user->id,
                ]
            ]);

            $clientSecret = $paymentIntent->client_secret;
        }
        $number_of_product_in_cart = CartItem::count();
        return view('customers.devices.cart', [
            'cartItems' => $cartItems,
            'total' => $total,
            'clientSecret' => $clientSecret,
            'number_of_product_in_cart'=>$number_of_product_in_cart,
        ]);
    }



    // store product in cart 
    public function addToCart($id)
    {
        try {
            $this->cartService->storeProduct($id);
            return redirect()->back()->with('success', __('The product has been added to the cart.'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateQuantity(Request $request)
    {
        $this->cartService->updateQuantity($request);
        return redirect()->back();
    }

    public function removeItem($id)
    {
        $this->cartService->removeItem($id);
        return redirect()->back();
    }
}
