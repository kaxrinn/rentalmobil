<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Penyewa;
use App\Models\Perental;

class AuthController extends Controller
{
    // ======== TAMPILKAN FORM REGISTRASI ========
    public function showRegister()
    {
        return view('auth.registerpage');
    }

    // ======== SIMPAN DATA PENYEWA BARU ========
    public function registerPenyewa(Request $request)
    {
        $request->validate([
            'nama_penyewa'     => 'required|string|max:255',
            'email'    => 'required|email|unique:penyewa',
            'kata_sandi' => 'required|min:6',
            'nomor_telepon'    => 'required',
        ]);

        Penyewa::create([
            'nama_penyewa'     => $request->nama_penyewa,
            'email'    => $request->email,
            'kata_sandi' => Hash::make($request->kata_sandi),
            'nomor_telepon'    => $request->nomor_telepon,
        ]);

        return redirect()->route('loginpage')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // ======== TAMPILKAN FORM LOGIN ========
    public function showLogin()
    {
        return view('auth.loginpage');
    }

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'kata_sandi' => 'required',
    ]);

    $email = $request->input('email');
    $password = $request->input('kata_sandi');

    // Cari user penyewa dan perental
    $penyewa = Penyewa::where('email', $email)->first();
    $perental = Perental::where('email', $email)->first();

    // Coba login sebagai penyewa
    if ($penyewa && Hash::check($password, $penyewa->kata_sandi)) {
        Auth::guard('penyewa')->login($penyewa);
        $request->session()->regenerate();

        // Jika login berhasil dan belum isi profile maka di arahkan ke halaman profile
    if (!$penyewa->alamat || !$penyewa->foto_ktp) {
    return redirect()->route('edit-profile.edit');
        }
// jika sudah mengisi profile akan di arahkan ke halaman landingpage);
        return redirect()->route('landingpage');
    }

    // Coba login sebagai perental
    if ($perental && Hash::check($password, $perental->kata_sandi)) {
        Auth::guard('perental')->login($perental);
        $request->session()->regenerate();

        // return dd('Login berhasil sebagai PERENTAL');
        return redirect()->route('admin');
    }

    // Gagal login
    return back()->withErrors([
        'email' => 'Email atau kata sandi salah.'
    ]);
}



    public function logout(Request $request)
{
    if (Auth::guard('penyewa')->check()) {
        Auth::guard('penyewa')->logout();
    } elseif (Auth::guard('perental')->check()) {
        Auth::guard('perental')->logout();
    }

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('landingpagebf');
}

}
