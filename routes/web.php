<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified' , 'role:admin'])->name('dashboard');

Route::get('/agent/dashboard', function () {
    return view('dashboard-agent.index');
})->middleware(['auth', 'verified' , 'role:agent'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


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


