<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // TAMPILKAN FORM REGISTRASI
    public function showRegister()
    {
        return view('auth.registerpage');
    }

    // SIMPAN USER BARU
    public function registerpage(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone'    => 'required',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'phone'    => $request->phone,
        ]);

        return redirect()->route('loginpage')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // TAMPILKAN FORM LOGIN
    public function showLogin()
    {
        return view('auth.loginpage');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin'); // arahkan ke halaman admin
        } elseif ($user->role === 'pelanggan') {
            return redirect()->route('landingpage'); // arahkan ke halaman pelanggan
        } else {
            Auth::logout();
            return back()->withErrors(['email' => 'Role tidak dikenali.']);
        }
    }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }


    // LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginpage')->with('success', 'Berhasil logout.');
    }

    // TAMPILKAN FORM EDIT PROFIL
    public function editProfile()
    {
        return view('auth.edit-profile', ['user' => Auth::user()]);
    }

    // SIMPAN PERUBAHAN PROFIL
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'phone'));

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
