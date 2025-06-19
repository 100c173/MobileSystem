<?php

use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class,'homePage']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__.'/auth.php';
require __DIR__.'/customer.php';
require __DIR__.'/admin-agent.php';
require __DIR__.'/admin.php';
require __DIR__.'/agent.php';


