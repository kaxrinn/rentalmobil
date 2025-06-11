<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingpagebfController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LupaKataSandiController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\AdminPemesananController;

//landing bf
Route::get('/landingpagebf', [LandingpagebfController::class, 'index'])->name('landingpagebf');

// Kontak
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Riwayat
Route::get('/riwayat', [PemesananController::class, 'riwayat'])->name('riwayat');


Route::prefix('admin')->group(function () {
    Route::get('/pemesanan', [AdminPemesananController::class, 'index'])->name('admin.pemesanan');
    Route::put('/pemesanan/{id}/status', [AdminPemesananController::class, 'updateStatus'])->name('admin.pemesanan.status');
    Route::delete('/pemesanan/{id}', [AdminPemesananController::class, 'destroy'])->name('admin.pemesanan.destroy');
});
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



// Form untuk user kirim pesan
Route::get('/contact', [PesanController::class, 'form'])->name('contact.form');

// Proses submit form
Route::post('/kirim-pesan', [PesanController::class, 'submit'])->name('contact.submit');

// Halaman admin untuk melihat daftar pesan
Route::get('/hubungiadmin', [PesanController::class, 'index'])->name('hubungiadmin');

// Admin hapus pesan
Route::delete('/admin/hubungi/{id}', [PesanController::class, 'destroy'])->name('admin.hapuspesan');

// Halaman admin untuk melihat daftar pengguna
Route::get('/admin/pengguna', [AdminController::class, 'daftarPengguna'])->name('penggunaadmin');
Route::delete('/admin/pengguna/{id_perental}', [AdminController::class, 'hapusPengguna'])->name('pengguna.hapus');
//Route::middleware(['auth', 'role:admin'])->group(function () {
    //Route::get('/admin', [AdminController::class, 'index'])->name('admin');
//});

// ==========================
// AUTH (Login & Register Page)
// ==========================
Route::get('/registerpage', [AuthController::class, 'showRegister'])->name('registerpage');
Route::get('/loginpage', [AuthController::class, 'showLogin'])->name('loginpage');
Route::get('/login', function () {
    return redirect()->route('loginpage');
})->name('login');
Route::post('/register', [AuthController::class, 'registerPenyewa'])->name('registerpage.post');
Route::post('/loginpage', [AuthController::class, 'login'])->name('loginpage.post');
// RESET Kata sandi
Route::get('/lupa-kata_sandi', [LupaKataSandiController::class, 'showResetForm'])->name('reset.form');
Route::post('/lupa-kata_sandi', [LupaKataSandiController::class, 'resetPasswordManual'])->name('reset.manual');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================
// PENYEWA (guard: penyewa)
// ==========================
Route::middleware('auth:penyewa')->group(function () {
    Route::get('/landingpage', function () {
        return view('pages.landingpage');
    })->name('landingpage');

    Route::get('/edit-profile', [EditProfileController::class, 'edit'])->name('edit-profile.edit');
    Route::post('/edit-profile', [EditProfileController::class, 'update'])->name('edit-profile.update');

});

// ==========================
// PERENTAL (guard: perental)
// ==========================
Route::middleware('auth:perental')->group(function () {
    Route::get('/admin', function () {
        return view('pages.admin');
    })->name('admin');
});







