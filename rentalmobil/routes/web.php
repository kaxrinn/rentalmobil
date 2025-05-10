<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\AdminController;

// Halaman Utama
Route::get('/landingpage', [LandingpageController::class, 'index'])->name('landingpage');

// Kontak
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Profil
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('edit_profile');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Riwayat
Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');

// Logout
Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');

//route untuk halaman admin page
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/pemesananadmin', [AdminController::class, 'pemesananAdmin'])->name('pemesananadmin');

Route::get('/mobiladmin', [AdminController::class, 'mobiladmin'])->name('mobiladmin');

Route::get('/ulasanadmin', [AdminController::class, 'ulasanadmin'])->name('ulasanadmin');

Route::get('/hubungiadmin', [AdminController::class, 'hubungiadmin'])->name('hubungiadmin');
