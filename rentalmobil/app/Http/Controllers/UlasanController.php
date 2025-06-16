<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    // **Menampilkan halaman riwayat (form ulasan berada di halaman ini)**
    public function form()
    {
        return view('pages.riwayat');
    }

    // **Menyimpan data ulasan dari form**
    public function submit(Request $request)
    {
        // **Validasi input dari form**
        $request->validate([
            'nama_penyewa' => 'required|string|max:255',
            'ulasan' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // **Menyimpan ke tabel ulasan**
        Ulasan::create([
            'nama_penyewa' => $request->nama_penyewa,
            'komentar' => $request->ulasan,
            'rating' => $request->rating,
        ]);

        // **Redirect kembali ke halaman sebelumnya dengan pesan sukses**
        return redirect()->back()->with('success', 'Ulasan berhasil dikirim.');
    }

    // **Menampilkan data ulasan di halaman admin**
    public function index()
    {
        $ulasan = Ulasan::latest()->get(); // Ambil semua ulasan, urutkan terbaru
        return view('pages.ulasanadmin', compact('ulasan'));
    }

    // **Menghapus ulasan berdasarkan ID**
    public function destroy($id)
    {
        Ulasan::where('id_ulasan', $id)->delete(); // Hapus ulasan
        return redirect()->route('ulasanadmin')->with('success', 'Ulasan berhasil dihapus.');
    }

    // **Mengambil data ulasan dalam bentuk JSON (biasanya untuk AJAX / API)**
    public function getUlasan()
    {
        $ulasan = Ulasan::latest()->get();
        return response()->json($ulasan);
    }
}
