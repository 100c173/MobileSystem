<?php

use App\Models\Brand;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Mobile\MobileController;
use App\Http\Controllers\Aget\AgentRequestController;
use App\Http\Controllers\Mobile\MobileImageController;
use App\Http\Controllers\Os\OperatingSystemController;
use App\Http\Controllers\Mobile\MobileDescriptionController;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\Mobile\MobileSpecificationController;





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



foreach (['admin', 'agent'] as $userType) {

    // Mobile
    Route::controller(MobileController::class)
        ->prefix("$userType/dashboard")
        ->middleware(['auth', "role:$userType"])
        ->as("$userType.")
        ->group(function () {
            Route::resource('mobiles', MobileController::class);
            Route::get('mobiles_under_review', [MobileController::class,'mobiles_under_review'])->name('mobiles_under_review');
            Route::get('mobile_accept/{id}', [MobileController::class,'mobile_accept'])->name('mobile_accept');
            Route::delete('mobile_reject/{id}', [MobileController::class,'mobile_reject'])->name('mobile_reject');
        });

    // Notification
    Route::controller(NotificationController::class)
        ->prefix("$userType/dashboard")
        ->middleware(['auth', "role:$userType"])
        ->as("$userType.")
        ->group(function () {
            Route::controller(NotificationController::class)->prefix('/admin/dashboard/')->group(function () {
            Route::middleware('auth', 'role:admin')->group(function () {
            Route::post('notification/markAllNotificationAsRead','markAllNotificationAsRead')->name('markAllNotificationAsRead');
            Route::get('notification/markNotificationAsRead/{id}','markNotificationAsRead')->name('markNotificationAsRead');
            Route::resource('notifications', NotificationController::class);
    });
});
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
