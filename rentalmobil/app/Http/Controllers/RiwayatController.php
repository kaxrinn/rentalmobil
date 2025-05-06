<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        // Kamu bisa load data dari database di sini kalau perlu.
        return view('riwayat');
    }
}
