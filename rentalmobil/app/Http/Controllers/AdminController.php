<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Halaman dashboard admin
    public function index()
    {
        return view('pages.admin');
    }

    // Halaman daftar pemesanan admin
    public function pemesananAdmin()
    {
        return view('pages.pemesananadmin');
    }

    // Halaman manajemen mobil
    public function mobilAdmin()
    {
        return view('pages.mobiladmin');
    }

    // Halaman ulasan
    public function ulasanAdmin()
    {
        return view('pages.ulasanadmin');
    }

    // Halaman pesan yang dikirim ke admin
    public function hubungiAdmin()
    {
        return view('pages.hubungiadmin');
    }

    // Daftar semua penyewa
    public function daftarPengguna()
    {
        $pengguna = Penyewa::all();
        return view('pages.penggunaadmin', compact('pengguna'));
    }

    // Hapus pengguna (penyewa) berdasarkan ID
    public function hapusPengguna($id)
    {
        $user = Penyewa::findOrFail($id);
        $user->delete();

        return redirect()->route('penggunaadmin')->with('success', 'Pengguna berhasil dihapus.');
    }
}
