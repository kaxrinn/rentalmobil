<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pemesanan' => 'required|exists:pemesanan,id_pemesanan',
            'kode_mobil' => 'required|exists:mobil,kode_mobil',
            'nama' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'pesan' => 'required|string'
        ]);

        $ulasan = Ulasan::create([
            'id_pemesanan' => $validated['id_pemesanan'],
            'kode_mobil' => $validated['kode_mobil'],
            'id_penyewa' => auth()->guard('penyewa')->id(),
            'nama' => $validated['nama'],
            'rating' => $validated['rating'],
            'pesan' => $validated['pesan']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Ulasan berhasil dikirim'
        ]);
    }
}