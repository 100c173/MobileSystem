<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/empty', function () {
    return view('dashboard.empty');
});


Route::get('/users/{user}/banFor24Hours',[UserController::class, 'banFor24Hours'])->name('users.banFor24Hours');
Route::get('/users/{user}/block',[UserController::class, 'block'])->name('users.blockPermenently');
Route::get('/users/{user}/unBlock',[UserController::class, 'unBlock'])->name('users.unBlock');
Route::get('/users/showdelUsers',[UserController::class, 'showdelusers'])->name('users.showdelposts');
Route::get('/users/restore/{id}',[UserController::class, 'restore'])->name('users.restore');
Route::get('/users/forceDelete/{id}',[UserController::class, 'forceDelete'])->name('users.forceDelete');
Route::resource('/users', UserController::class);
