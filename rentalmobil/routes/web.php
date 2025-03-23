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

// Route untuk halaman registrasi
Route::get('/register', function () {
    return view('register');
})->name('register');

// Route untuk halaman registrasi
Route::get('/mobil', function () {
    return view('mobil');
})->name('mobil');

// Route untuk halaman registrasi
Route::get('/lupasandi', function () {
    return view('lupasandi');
})->name('lupasandi');