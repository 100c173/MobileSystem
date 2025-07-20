<?php

use App\Models\Brand;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Aget\AgentRequestController;
use App\Http\Controllers\Customer\CustomerDevices;
use App\Http\Controllers\Os\OperatingSystemController;
use Stripe\Customer;

Route::get('/admin/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified', 'role:admin'])->name('admin.dashboard');


Route::controller(AgentRequestController::class)->prefix('/admin/dashboard/agent-requests')->group(function () {
    Route::middleware('auth', 'role:admin')->group(function () {

        Route::get('/', 'index')->name('agent-requests');
        Route::get('/agent_requests_accepted', 'agent_requests_accepted')->name('agent-requests-accepted');
        Route::get('/agent_requests_rejected', 'agent_requests_rejected')->name('agent-requests-rejected');
        Route::get('/agent_requests_softDeleted', 'agent_requests_softDeleted')->name('agent-requests-softDeleted');
        Route::get('/restore/{id}', 'restore')->name('agent-requests.restore');

        Route::delete('/softDelete/{id}', 'softDelete')->name('agent-requests.softDelete');
        Route::delete('/destroy/{id}', 'destroy')->name('agent-requests.destroy');

        Route::post('/accepte/{id}', 'approveAgentRequest')->name('agent-requests-accepte');
        Route::post('/reject/{id}', 'rejectAgentRequest')->name('agent-requests-reject');
        Route::post('/repending/{id}', 'rependingAgentRequest')->name('agent-requests-repending');
    });
});

Route::controller(UserController::class)->prefix('/admin/dashboard/')->group(function () {
    Route::middleware('auth', 'role:admin')->group(function () {
        Route::get('users/{user}/banFor24Hours', 'banFor24Hours')->name('users.banFor24Hours');
        Route::get('users/{user}/block', 'block')->name('users.blockPermenently');
        Route::get('users/{user}/unBlock', 'unBlock')->name('users.unBlock');
        Route::get('users/showdelUsers', 'showdelusers')->name('users.trashed');
        Route::get('users/restore/{id}', 'restore')->name('users.restore');
        Route::get('users/forceDelete/{id}', 'forceDelete')->name('users.forceDelete');

        // RESTful resource routes
        Route::resource('users', UserController::class);

    });
});


//Notification
// Route::controller(NotificationController::class)->prefix('/admin/dashboard/')->group(function () {
//     Route::middleware('auth', 'role:admin')->group(function () {
//         route::post('notification/markAllNotificationAsRead','markAllNotificationAsRead')->name('markAllNotificationAsRead');
//         route::get('notification/markNotificationAsRead/{id}','markNotificationAsRead')->name('markNotificationAsRead');
//         Route::resource('notification', NotificationController::class);
//     });
// });

// Brand
Route::controller(BrandController::class)->prefix('/admin/dashboard/')->group(function () {
    Route::middleware('auth', 'role:admin')->group(function () {
        Route::resource('brands', BrandController::class);
        Route::get('mobilesByBrand/{id}', [BrandController::class,'mobilesByBrand'])->name('mobilesByBrand');
    });
});

// Operating Systems
Route::controller(OperatingSystemController::class)->prefix('/admin/dashboard/')->group(function () {
    Route::middleware('auth', 'role:admin')->group(function () {
        Route::resource('operatingSystems', OperatingSystemController::class);
        Route::get('mobilesByOs/{id}', [OperatingSystemController::class,'mobilesByOs'])->name('mobilesByOs');
    });
});


// Review Devices
Route::controller(CustomerDevices::class)->prefix('/admin/dashboard/')->group(function () {
    Route::middleware('auth', 'role:admin')->group(function () {
        Route::get('customer_devices','devicesForReview')->name('customer.devices');
        Route::post('customer_devices/approve/{id}','approveRequest')->name('customer_devices.approve');
        Route::post('customer_devices/reject/{id}','rejectRequest')->name('customer_devices.reject');
    });
});