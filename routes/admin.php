<?php

use App\Http\Controllers\Aget\AgentRequestController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/admin/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified' , 'role:admin'])->name('dashboard');


Route::controller(AgentRequestController::class)->group(function () {
    Route::middleware('auth', 'role:admin')->group(function () {
        Route::get('/admin/dashboard/agent-requests', 'index')->name('agent-requests');
        Route::post('/admin/dashboard/agent-requests/accepte/{id}', 'approveAgentRequest')->name('agent-requests-accepte');
        Route::post('/admin/dashboard/agent-requests/reject/{id}', 'rejectAgentRequest')->name('agent-requests-reject');
    });
});

Route::controller(UserController::class)->group(function () {
    Route::middleware('auth', 'role:admin')->group(function () {
        Route::get('/admin/dashboard/users/{user}/banFor24Hours', 'banFor24Hours')->name('users.banFor24Hours');
        Route::get('/admin/dashboard/users/{user}/block', 'block')->name('users.blockPermenently');
        Route::get('/admin/dashboard/users/{user}/unBlock', 'unBlock')->name('users.unBlock');
        Route::get('/admin/dashboard/users/showdelUsers', 'showdelusers')->name('users.showdelposts');
        Route::get('/admin/dashboard/users/restore/{id}', 'restore')->name('users.restore');
        Route::get('/admin/dashboard/users/forceDelete/{id}', 'forceDelete')->name('users.forceDelete');
    });
});

Route::resource('/admin/dashboard/users', UserController::class);
