<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\EditProfileController;


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

// REGISTRASI
Route::get('/registerpage', [AuthController::class, 'showRegister'])->name('registerpage');
Route::post('/registerpage', [AuthController::class, 'register'])->name('registerpage.post');

// LOGIN
Route::get('/loginpage', [AuthController::class, 'showLogin'])->name('loginpage');
Route::post('/loginpage', [AuthController::class, 'login'])->name('loginpage.post');

// RESET PASSWORD
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// EDIT PROFIL

Route::get('/edit-profile', [EditProfileController::class, 'show'])->name('edit-profile');
Route::post('/edit-profile', [EditProfileController::class, 'update'])->name('edit-profile.update');
