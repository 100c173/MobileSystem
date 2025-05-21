<?php

use App\Http\Controllers\Aget\AgentMobileStocksController;
use App\Http\Controllers\Mobile\MobileController;
use Illuminate\Support\Facades\Route;

Route::get('/agent/dashboard', function () {
    return view('dashboard-agent.index');
})->middleware(['auth', 'verified', 'role:agent'])->name('dashboard');

Route::get('/agent/dashboard/mobiles', [MobileController::class, 'index'])
    ->middleware('auth', 'role:agent')
    ->name('agent.select-devices');

 Route::middleware('auth', 'role:agent')->prefix('/agent/dashboard/')->group(function () {
    Route::resource('agent-stocks',AgentMobileStocksController::class);
 });