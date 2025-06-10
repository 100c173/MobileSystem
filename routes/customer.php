<?php

use App\Http\Controllers\Customer\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;

Route::get('home',[HomeController::class,'homePage']);
Route::get('latest_devices',[HomeController::class,'latestDevices']);
Route::get('mobile_details/{id}',[HomeController::class,'mobileDetails'])->name('mobil_details');
Route::get('agent_stocks',[HomeController::class,'agentStock'])->name('agent_stocks');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/store/{id}',  [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.removeItem');
});