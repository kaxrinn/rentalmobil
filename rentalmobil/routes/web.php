<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Route untuk DashboardController
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route default Laravel
Route::get('/', function () {
    return view('welcome');
});