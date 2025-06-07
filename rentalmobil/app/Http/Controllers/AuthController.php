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
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:penyewa',
            'password' => 'required|min:6',
            'phone'    => 'required',
        ]);

        Penyewa::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'phone'    => $request->phone,
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
    $credentials = $request->only('email', 'password');

    // Coba login penyewa dulu
    if (Auth::guard('penyewa')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('landingpage');
    }

    // Jika gagal, coba login perental
    if (Auth::guard('perental')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('admin');
    }

    return back()->withErrors(['email' => 'Email atau password salah.']);
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
