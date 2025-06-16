<?php

use App\Http\Controllers\Aget\AgentMobileStocksController;
use App\Http\Controllers\Mobile\MobileController;
use App\Http\Controllers\PaymentSystem\StripeConnectController;
use Illuminate\Support\Facades\Route;


Route::get('/agent/dashboard', function () {
    return view('dashboard-agent.index');
})->middleware(['auth', 'verified', 'role:agent'])->name('dashboard');


Route::middleware('auth', 'role:agent')->prefix('/agent/dashboard/')->group(function () {
    Route::resource('agent-stocks',AgentMobileStocksController::class);
});


Route::middleware('auth', 'role:agent')->group(function () {
    
    Route::get('/stripe/connect', [ StripeConnectController::class, 'createAccountLink' ])->name('stripe.connect');
    Route::get('/stripe/return',  [ StripeConnectController::class, 'accountReturn'     ])->name('stripe.account.return');
    Route::get('/stripe/refresh', [ StripeConnectController::class, 'accountRefresh'    ])->name('stripe.account.refresh');
   
});

