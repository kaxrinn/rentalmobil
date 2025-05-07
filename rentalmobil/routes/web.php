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

// Route untuk login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Route untuk mobil
Route::get('/mobil', function () {
    return view('mobil');
})->name('mobil');

// Route untuk lupa sandi
Route::get('/lupasandi', function () {
    return view('lupasandi');
})->name('lupasandi');

// Route untuk landingpage_before
Route::get('/landingpage_before', function () {
    return view('landingpage_before');
})->name('landingpage_before');

// Route untuk ulasan
Route::get('/ulasan', function () {
    return view('ulasan');
})->name('ulasan');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/edit_profile', function () {
    return view('edit_profile');
})->name('edit_profile');

Route::get('/detail', function () {
    return view('detail');
})->name('detail');

