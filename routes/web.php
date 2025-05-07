<?php
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/empty', function () {
    return view('dashboard.empty');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/users/{user}/banFor24Hours', 'banFor24Hours')->name('users.banFor24Hours');
    Route::get('/users/{user}/block', 'block')->name('users.blockPermenently');
    Route::get('/users/{user}/unBlock', 'unBlock')->name('users.unBlock');
    Route::get('/users/showdelUsers','showdelusers')->name('users.showdelposts');
    Route::get('/users/restore/{id}','restore')->name('users.restore');
    Route::get('/users/forceDelete/{id}','forceDelete')->name('users.forceDelete');
});


Route::resource('/users', UserController::class);


