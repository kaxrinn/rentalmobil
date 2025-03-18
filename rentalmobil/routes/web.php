<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;

// Route untuk ItemsController
Route::get('/items', [ItemController::class, 'index']);

// Route untuk DashboardController
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route default Laravel
Route::get('/', function () {
    return view('welcome');
});