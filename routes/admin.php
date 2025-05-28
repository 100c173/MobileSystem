<?php

use App\Http\Controllers\Aget\AgentRequestController;
use App\Http\Controllers\Mobile\MobileController;
use App\Http\Controllers\Mobile\MobileDescriptionController;
use App\Http\Controllers\Mobile\MobileImageController;
use App\Http\Controllers\Mobile\MobileSpecificationController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;




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



foreach (['admin', 'agent'] as $userType) {

    Route::controller(MobileController::class)
        ->prefix("$userType/dashboard")
        ->middleware(['auth', "role:$userType"])
        ->as("$userType.")
        ->group(function () {
            Route::resource('mobiles', MobileController::class);
        });

    // Mobile Specifications
    Route::controller(MobileSpecificationController::class)
        ->prefix("$userType/dashboard")
        ->middleware(['auth', "role:$userType"])
        ->as("$userType.")
        ->group(function () {
            Route::get('specification/{id}', 'specification')->name('specification');
            Route::get('create_specification/{id}', 'create_specification')->name('create_specification');
            Route::resource('mobileSpcifications', MobileSpecificationController::class);
        });

    // Mobile Descriptions
    Route::controller(MobileDescriptionController::class)
        ->prefix("$userType/dashboard")
        ->middleware(['auth', "role:$userType"])
        ->as("$userType.")
        ->group(function () {
            Route::get('description/{id}', 'description')->name('description');
            Route::get('create_description/{id}', 'create_description')->name('create_description');
            Route::resource('mobileDescriptions', MobileDescriptionController::class);
        });

    //  Mobile Images
    Route::controller(MobileImageController::class)
        ->prefix("$userType/dashboard")
        ->middleware(['auth', "role:$userType"])
        ->as("$userType.")
        ->group(function () {
            Route::get('images/{id}', 'images')->name('images');
            Route::get('unEssential/{id}', 'make_image_unEssential')->name('make_image_unEssential');
            Route::get('essential/{imageId}/{mobileId}', 'make_image_essential')->name('make_image_essential');
            Route::resource('mobileImages', MobileImageController::class);
        });
}
