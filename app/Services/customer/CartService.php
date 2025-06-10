<?php

namespace App\Services\customer;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public function getAllCartItems()
    {
        $userId = Auth::id();
        return CartItem::with('product', 'user')->where('user_id', $userId)->get();
    }

    public function storeProduct(int $id)
    {
        CartItem::create([
            'user_id' => Auth::id(),
            'product_id' => $id,
        ]);
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::where('product_id', $request->product_id)
            ->where('user_id', Auth::id())
            ->first();


        $cartItem->quantity = $request->quantity;
        $cartItem->save();
    }

    public function removeItem($id)
    {
        $product = CartItem::findOrFail($id) ; 
        $product->delete();
    }
}
