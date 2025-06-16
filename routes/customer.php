<?php

use App\Http\Controllers\Customer\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\PaymentSystem\PaymentController;

Route::get('home',[HomeController::class,'homePage'])->name('home');
Route::get('latest_devices',[HomeController::class,'latestDevices']);
Route::get('mobile_details/{id}',[HomeController::class,'mobileDetails'])->name('mobil_details');
Route::get('agent_stocks',[HomeController::class,'agentStock'])->name('agent_stocks');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/store/{id}',  [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.removeItem');
});




Route::middleware(['auth'])->group(function () {
    Route::post('/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
    Route::post('/confirm-payment', [PaymentController::class, 'confirmPayment'])->name('payment.confirmPayment');
    Route::get('/checkout/success', [PaymentController::class, 'success'])->name('payment.success');
});
