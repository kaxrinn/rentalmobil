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

// Route untuk beranda
Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

// Route untuk hubungi_kami
Route::get('/hubungi_kami', function () {
    return view('hubungi_kami');
})->name('hubungi_kami');

// Route untuk landingpage
Route::get('/landingpage', function () {
    return view('landingpage');
})->name('landingpage');