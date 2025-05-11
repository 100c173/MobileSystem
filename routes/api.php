<?php

use App\Http\Controllers\Api\Agent\AgentRequestController ;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;




Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login'   , 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(AuthController::class)->group(function(){
        Route::get('user', 'user');
        Route::post('logout','logout');
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(AgentRequestController::class)->group(function(){
        Route::post('agent-requests', 'store');
        Route::get('agent-requests', 'show');
        Route::put('agent-requests', 'update');
        Route::delete('agent-requests', 'destroy');
        Route::get('agent-requests-status', 'showStatus');
    });

});