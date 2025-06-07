<?php

namespace App\Http\Controllers;
use App\Models\Penyewa;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin');
    }

    public function pemesananadmin()
    {
        return view('pages.pemesananadmin');
    }
    public function mobiladmin()
    {
        return view('pages.mobiladmin');
    }
    public function ulasanadmin()
    {
        return view('pages.ulasanadmin');
    }
    public function hubungiadmin()
    {
        return view('pages.hubungiadmin');
    }

     public function daftarPengguna()
    {
    $pengguna = Penyewa::all(); // ambil data dari tabel penyewa
    return view('pages.penggunaadmin', compact('pengguna'));
    }

    public function hapusPengguna($id)
    {
    $user = Penyewa::findOrFail($id); // hapus data dari tabel penyewa
    $user->delete();

    return redirect()->route('penggunaadmin')->with('success', 'Pengguna berhasil dihapus.');
}

}

