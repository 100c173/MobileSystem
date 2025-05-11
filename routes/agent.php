<?php

use Illuminate\Support\Facades\Route;

Route::get('/agent/dashboard', function () {
    return view('dashboard-agent.index');
})->middleware(['auth', 'verified' , 'role:agent'])->name('dashboard');
