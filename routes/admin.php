<?php

use App\Http\Controllers\Aget\AgentRequestController ;
use Illuminate\Support\Facades\Route;

Route::controller(AgentRequestController::class)->group(function(){
    Route::middleware('auth', 'role:admin')->group(function () {
        Route::get('/admin/dashboard/agent-requests','index')->name('agent-requests');
    });
});

