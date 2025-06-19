<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Services\Profile\ProfileService;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index(Request $request): View
    {
        $user = $this->profileService->getAuthenticatedUser();
        $number_of_product_in_cart = $this->profileService->getCartItemCount();

        return view('profile.index', compact('user', 'number_of_product_in_cart', 'request'));
    }

    public function edit(Request $request): View
    {
        $number_of_product_in_cart = $this->profileService->getCartItemCount();
        return view('profile.index', [
            'user' => $request->user(),
            'number_of_product_in_cart' => $number_of_product_in_cart,
        ])->with('success', 'we');
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $this->profileService->updateUserProfile($request->user(), $request->validated());

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $this->profileService->deleteUserAccount($request);

        return Redirect::to('/home');
    }
}
