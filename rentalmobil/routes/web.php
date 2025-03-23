<?php

use Illuminate\Support\Facades\Route;

// Route untuk pemesanan
Route::get('/pemesanan', function () {
    return view('pemesanan');
})->name('pemesanan');

// Route untuk riwayat
Route::get('/riwayat', function () {
    return view('riwayat');
})->name('riwayat');

// Route untuk search
Route::get('/search', function () {
    return view('search');
})->name('search');