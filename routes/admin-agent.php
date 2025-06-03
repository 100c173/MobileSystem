<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mobile\MobileController;
use App\Http\Controllers\Mobile\MobileImageController;
use App\Http\Controllers\Mobile\MobileDescriptionController;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\Mobile\MobileSpecificationController;

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
            Route::post('notification/markAllNotificationAsRead','markAllNotificationAsRead')->name('markAllNotificationAsRead');
            Route::get('notification/markNotificationAsRead/{id}','markNotificationAsRead')->name('markNotificationAsRead');
            Route::resource('notifications', NotificationController::class);
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
