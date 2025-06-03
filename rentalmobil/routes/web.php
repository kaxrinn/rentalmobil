<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\LandingpagebfController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\PemesananController;

// Halaman Utama
Route::get('/landingpage', [LandingpageController::class, 'index'])->name('landingpage');

Route::get('/landingpagebf', [LandingpagebfController::class, 'index'])->name('landingpagebf');

// Kontak
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Riwayat
Route::get('/riwayat', [PemesananController::class, 'riwayat'])->name('riwayat');


// Logout
Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');

//route untuk halaman admin page
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/pemesananadmin', [AdminController::class, 'pemesananAdmin'])->name('pemesananadmin');
Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');

Route::prefix('mobiladmin')->group(function () {
    Route::get('/', [MobilController::class, 'index'])->name('mobiladmin');
    Route::get('/{kode_mobil}/edit', [MobilController::class, 'edit'])->name('mobil.edit');
    Route::post('/', [MobilController::class, 'store'])->name('mobil.store');
    Route::put('/{kode_mobil}', [MobilController::class, 'update'])->name('mobil.update');
    Route::delete('/{kode_mobil}', [MobilController::class, 'destroy'])->name('mobil.destroy');
    Route::get('/debug-storage', [MobilController::class, 'debugStorage']);
});
Route::get('/storage/{path}', function ($path) {
    $file = storage_path('app/public/' . $path);
    if (file_exists($file)) {
        return response()->file($file);
    }
    abort(404);
})->where('path', '.*');

Route::get('/ulasanadmin', [AdminController::class, 'ulasanadmin'])->name('ulasanadmin');

Route::get('/hubungiadmin', [AdminController::class, 'hubungiadmin'])->name('hubungiadmin');

// REGISTRASI
Route::get('/registerpage', [AuthController::class, 'showRegister'])->name('registerpage');
Route::post('/registerpage', [AuthController::class, 'registerpage'])->name('registerpage.post');

// LOGIN
Route::get('/loginpage', [AuthController::class, 'showLogin'])->name('loginpage');
Route::post('/loginpage', [AuthController::class, 'login'])->name('loginpage.post');

//LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// RESET PASSWORD
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// EDIT PROFIL
Route::middleware(['auth'])->group(function () {
Route::get('/edit-profile', [EditProfileController::class, 'show'])->name('edit-profile');
Route::post('/edit-profile', [EditProfileController::class, 'update'])->name('edit-profile.update');

// Form untuk user kirim pesan
Route::get('/contact', [PesanController::class, 'form'])->name('contact.form');

// Proses submit form
Route::post('/kirim-pesan', [PesanController::class, 'submit'])->name('contact.submit');

// Halaman admin untuk melihat daftar pesan
Route::get('/hubungiadmin', [PesanController::class, 'index'])->name('hubungiadmin');

// Admin hapus pesan
Route::delete('/admin/hubungi/{id}', [PesanController::class, 'destroy'])->name('admin.hapuspesan');

});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});