<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\OrderController;

Route::middleware('api')->group(function () {
    // Endpoint untuk mendapatkan semua mobil yang tersedia
    Route::get('/mobils', [MobilController::class, 'apiIndex']);
    
    // Endpoint untuk mendapatkan detail mobil spesifik
    Route::get('/mobils/{kode_mobil}', [MobilController::class, 'apiShow']);
    
    // Endpoint untuk membuat order baru
    Route::post('/orders', [OrderController::class, 'store']);
});