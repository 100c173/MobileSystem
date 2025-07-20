<?php

use App\Http\Controllers\Aget\AgentRequestController;
use App\Http\Controllers\Country_City\CountryController;
use App\Http\Controllers\Customer\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\PaymentSystem\PaymentController;

/*
|--------------------------------------------------------------------------
| Public Routes (No Authentication Required)
|--------------------------------------------------------------------------
*/

// Home page route
Route::get('home', [HomeController::class, 'homePage'])->name('home.page');
// Latest devices listing page
Route::get('latest_devices', [HomeController::class, 'latestDevices'])->name('lastest.mobiles');

// Filtering routes for devices
Route::get('latest_devices/filter', [HomeController::class, 'filterMobiles'])->name('mobiles.filter');
Route::get('agent_devices/filter', [HomeController::class, 'filterAgentMobiles'])->name('agent_devices.filter');

// Mobile device details page
Route::get('mobile_details/{id}', [HomeController::class, 'mobileDetails'])->name('mobil_details');

// Agent stock listing page
Route::get('agent_stocks', [HomeController::class, 'agentStock'])->name('agent_stocks');

// Agent gallery page
Route::get('agents/{id}', [HomeController::class, 'agentGallery'])->name('agent.gallery');

// Agent search functionality
Route::post('/search-agents', [HomeController::class, 'searchAgents'])->name('search.agents');

// Get provinces for a given country (AJAX)
Route::get('/get-provinces/{country}', [CountryController::class, 'getProvinces']);

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Require Authentication)
|--------------------------------------------------------------------------
*/

// Shopping cart routes group
Route::middleware('auth')->group(function () {

    // View cart contents
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    // Add item to cart
    Route::post('/cart/store/{id}',  [CartController::class, 'addToCart'])->name('cart.store');

    // Update item quantity in cart
    Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');

    // Remove item from cart
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.removeItem');
});

// Agent request routes group
Route::middleware('auth')->group(function () {
    Route::controller(AgentRequestController::class)->group(function () {
        // Create new agent request
        Route::post('agent-requests', 'store')->name('make_agent_request');

        // Show agent requests
        Route::get('agent-requests', 'show');

        // Update agent request
        Route::put('agent-requests', 'update');

        // Delete agent request
        Route::delete('agent-requests', 'destroy');

        // Check agent request status
        Route::get('agent-requests-status', 'showStatus');
    });
    
    // Customer request submission
    Route::post('customer_request', [HomeController::class, 'customerRequest'])->name('customer.request');
});

// Payment routes group
Route::middleware(['auth'])->group(function () {
    // Initiate checkout process
    Route::post('/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');

    // Confirm payment
    Route::post('/confirm-payment', [PaymentController::class, 'confirmPayment'])->name('payment.confirmPayment');

    // Successful payment page
    Route::get('/checkout/success', [PaymentController::class, 'success'])->name('payment.success');
});
