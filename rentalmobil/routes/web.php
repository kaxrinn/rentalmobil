<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;

// Route untuk LoginController
Route::get('/login', [LoginController::class, 'index']);

// Route untuk DashboardController
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route untuk ItemsController
Route::get('/items', [ItemController::class, 'index']);

// Route default Laravel
Route::get('/', function () {
    return view('welcome');
});

