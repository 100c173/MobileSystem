<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Services\customer\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $number_of_product_in_cart = CartItem::count();
        $cartItems =  $this->cartService->getAllCartItems();
        return view('customers.devices.cart', compact('cartItems','number_of_product_in_cart'));
    }

    // store product in cart 
    public function addToCart($id)
    {
        $this->cartService->storeProduct($id);
        return redirect()->back();
    }

    public function updateQuantity(Request $request)
    {
        $this->cartService->updateQuantity($request) ;
        return redirect()->back();
    }

    public function removeItem($id) {
        $this->cartService->removeItem($id) ;
        return redirect()->back();
    }
}
