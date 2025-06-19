<?php

namespace App\Services\Profile;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileService
{
    public function getAuthenticatedUser()
    {
        return Auth::user();
    }

    public function getCartItemCount(): int
    {
        return CartItem::count();
    }

    public function updateUserProfile($user, array $validatedData)
    {
        $user->fill($validatedData);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();
    }

    public function deleteUserAccount(Request $request)
    {
        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
