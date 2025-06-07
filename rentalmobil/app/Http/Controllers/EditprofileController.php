<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    public function show()
    {
        return view('pages.editprofile'); // pastikan nama file view sesuai
    }

     // ======== TAMPILKAN HALAMAN EDIT PROFIL ========
    public function edit()
    {
        if (Auth::guard('penyewa')->check()) {
            $user = Auth::guard('penyewa')->user();
        } elseif (Auth::guard('perental')->check()) {
            $user = Auth::guard('perental')->user();
        } else {
            return redirect()->route('loginpage');
        }

        return view('pages.editprofile', compact('user'));
    }

    // ======== SIMPAN PERUBAHAN PROFIL (NAMA, EMAIL, HP, PASSWORD) ========
    public function update(Request $request)
    {
        if (Auth::guard('penyewa')->check()) {
            $user = Auth::guard('penyewa')->user();
            $table = 'penyewa';
        } elseif (Auth::guard('perental')->check()) {
            $user = Auth::guard('perental')->user();
            $table = 'perental';
        } else {
            return redirect()->route('loginpage');
        }

        // Validasi data
        $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => "required|email|unique:$table,email," . $user->id,
        'phone'    => 'nullable|string|max:15',
        'password' => 'nullable|string|min:6|confirmed',
        'alamat'   => 'nullable|string|max:500',
        'ktp'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update field
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->alamat = $request->alamat;

        // Upload foto KTP jika diisi
        if ($request->hasFile('ktp')) {
        $filename = time() . '.' . $request->ktp->extension();
        $request->ktp->move(public_path('uploads/ktp'), $filename);
        $user->ktp = 'uploads/ktp/' . $filename;
    }

        if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}