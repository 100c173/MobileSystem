<?php

use App\Http\Controllers\Aget\AgentRequestController;
use App\Http\Controllers\Mobile\MobileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/admin/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified' , 'role:admin'])->name('admin.dashboard');


Route::controller(AgentRequestController::class)->group(function () {
    Route::middleware('auth', 'role:admin')->group(function () {

        Route::get('/admin/dashboard/agent-requests', 'index')->name('agent-requests');
        Route::get('/admin/dashboard/agent-requests/agent_requests_accepted', 'agent_requests_accepted')->name('agent-requests-accepted');
        Route::get('/admin/dashboard/agent-requests/agent_requests_rejected', 'agent_requests_rejected')->name('agent-requests-rejected');
        Route::get('/admin/dashboard/agent-requests/agent_requests_softDeleted', 'agent_requests_softDeleted')->name('agent-requests-softDeleted');
        Route::get('/admin/dashboard/agent-requests/restore/{id}', 'restore')->name('agent-requests.restore');

        Route::delete('/admin/dashboard/agent-requests/softDelete/{id}', 'softDelete')->name('agent-requests.softDelete');
        Route::delete('/admin/dashboard/agent-requests/destroy/{id}', 'destroy')->name('agent-requests.destroy');

        Route::post('/admin/dashboard/agent-requests/accepte/{id}', 'approveAgentRequest')->name('agent-requests-accepte');
        Route::post('/admin/dashboard/agent-requests/reject/{id}', 'rejectAgentRequest')->name('agent-requests-reject');
        Route::post('/admin/dashboard/agent-requests/repending/{id}', 'rependingAgentRequest')->name('agent-requests-repending');
    });
});

Route::controller(UserController::class)->group(function () {
    Route::middleware('auth', 'role:admin')->group(function () {
        Route::get('/admin/dashboard/users/{user}/banFor24Hours', 'banFor24Hours')->name('users.banFor24Hours');
        Route::get('/admin/dashboard/users/{user}/block', 'block')->name('users.blockPermenently');
        Route::get('/admin/dashboard/users/{user}/unBlock', 'unBlock')->name('users.unBlock');
        Route::get('/admin/dashboard/users/showdelUsers', 'showdelusers')->name('users.trashed');
        Route::get('/admin/dashboard/users/restore/{id}', 'restore')->name('users.restore');
        Route::get('/admin/dashboard/users/forceDelete/{id}', 'forceDelete')->name('users.forceDelete');
    });
});

//Mobile
Route::controller(MobileController::class)->group(function () {
    Route::middleware('auth', 'role:admin')->group(function () {
        
    });
});
Route::resource('mobiles', MobileController::class)->middleware('auth', 'role:admin');

Route::resource('/admin/dashboard/users', UserController::class);
