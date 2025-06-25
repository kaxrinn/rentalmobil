<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class EditProfileController extends Controller
{
    public function show()
    {
        return view('pages.editprofile');
    }

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

public function update(Request $request)
{
    if (Auth::guard('penyewa')->check()) {
        $user = Auth::guard('penyewa')->user();
        $table = 'penyewa';
        $id = $user->id_penyewa;
    } elseif (Auth::guard('perental')->check()) {
        $user = Auth::guard('perental')->user();
        $table = 'perental';
        $id = $user->id_perental;
    } else {
        return redirect()->route('loginpage');
    }

    // Validasi: Harus isi alamat dan unggah foto KTP (jika belum ada sebelumnya)
    if (empty($request->alamat) || (!$request->hasFile('foto_ktp') && empty($user->foto_ktp))) {
        return redirect()->back()->with('warning', 'Harap lengkapi alamat dan unggah foto KTP terlebih dahulu.');
    }

    // Validasi data lengkap
$request->validate([
    'nama_penyewa'     => 'required|string|max:255',
    'email'            => "required|email|unique:$table,email,$id,id_penyewa",
    'nomor_telepon'    => 'nullable|string|max:15',
    'kata_sandi'       => 'nullable|string|min:6|confirmed',
    'alamat'           => 'required|string|max:500',
    'foto_ktp'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
]);


    $emailLama = $user->email;
    $passwordDiisi = $request->filled('kata_sandi');

    // Update field
    $user->nama_penyewa = $request->nama_penyewa;
    $user->email = $request->email;
    $user->nomor_telepon = $request->nomor_telepon;
    $user->alamat = $request->alamat;

    // Upload foto KTP jika ada
    if ($request->hasFile('foto_ktp')) {
        $filename = time() . '.' . $request->foto_ktp->extension();
        $request->foto_ktp->move(public_path('uploads/foto_ktp'), $filename);
        $user->foto_ktp = 'uploads/foto_ktp/' . $filename;
    }

    // Ubah password jika diisi
    if ($passwordDiisi) {
        $user->kata_sandi = Hash::make($request->kata_sandi);
    }

    $user->save();

    // Logout jika email atau password diubah
    if ($emailLama !== $user->email || $passwordDiisi) {
        Auth::guard('penyewa')->logout();
        Auth::guard('perental')->logout();
        return redirect()->route('loginpage')->with('success', 'Profil diperbarui. Silakan login kembali.');
    }

    return redirect()->route('landingpage')->with('success', 'Profil berhasil diperbarui!');
}

    public function index()
    {
        $penyewa = \App\Models\Penyewa::where('id_user', auth()->id())->first();

        if (!$penyewa || empty($penyewa->alamat) || empty($penyewa->foto_ktp)) {
            return redirect()->route('editprofile')->with('warning', 'Silakan lengkapi profil terlebih dahulu.');
        }

        return view('pages.section.landingpage', compact('penyewa'));
    }
}
