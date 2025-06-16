<?php

use App\Http\Controllers\Aget\AgentRequestController;
use App\Http\Controllers\Customer\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;


Route::get('home', [HomeController::class, 'homePage'])->name('home.page');
Route::get('latest_devices', [HomeController::class, 'latestDevices'])->name('lastest.mobiles');

Route::get('latest_devices/filter', [HomeController::class, 'filterMobiles'])->name('mobiles.filter');
Route::get('agent_devices/filter', [HomeController::class, 'filterAgentMobiles'])->name('agent_devices.filter');

Route::get('mobile_details/{id}', [HomeController::class, 'mobileDetails'])->name('mobil_details');
Route::get('agent_stocks', [HomeController::class, 'agentStock'])->name('agent_stocks');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/store/{id}',  [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.removeItem');
});
Route::middleware('auth')->group(function () {
    Route::controller(AgentRequestController::class)->group(function () {
        Route::post('agent-requests', 'store')->name('make_agent_request');
        Route::get('agent-requests', 'show');
        Route::put('agent-requests', 'update');
        Route::delete('agent-requests', 'destroy');
        Route::get('agent-requests-status', 'showStatus');
    });
});
