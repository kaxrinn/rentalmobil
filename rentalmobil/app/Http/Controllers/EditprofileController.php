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
        'nama_penyewa'     => 'required|string|max:255',
        'email'    => "required|email|:$table,email," . $user->id_penyewa,
        'nomor_telepon'    => 'nullable|string|max:15',
        'kata_sandi' => 'nullable|string|min:6|confirmed',
        'alamat'   => 'nullable|string|max:500',
        'foto_ktp'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update field
        $user->nama_penyewa = $request->nama_penyewa;
        $user->email = $request->email;
        $user->nomor_telepon = $request->nomor_telepon;
        $user->alamat = $request->alamat;

        // Upload foto KTP jika diisi
        if ($request->hasFile('foto_ktp')) {
        $filename = time() . '.' . $request->foto_ktp->extension();
        $request->foto_ktp->move(public_path('uploads/foto_ktp'), $filename);
        $user->foto_ktp = 'uploads/foto_ktp/' . $filename;
    }

        if ($request->filled('kata_sandi')) {
        $user->kata_sandi = Hash::make($request->kata_sandi);
    }

        $user->save();

        
        return redirect()->back()->with('success', 'Pembaruan profil telah berhasil.');

    }
}