<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemesananController extends Controller
{
    // Menampilkan halaman pemesanan
    public function index()
    {
        // Data pemesanan bisa ditambahkan di sini nanti jika ingin mengambil dari database
        // Misalnya menggunakan model Pemesanan:
        // $pemesanan = Pemesanan::all();

        return view('pemesanan'); // Menampilkan view pemesanan.blade.php
    }
}
