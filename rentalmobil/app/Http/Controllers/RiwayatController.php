<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;

class RiwayatController extends Controller
{
  public function index()
{
    $user = Auth::user();
    
    $pemesanans = Pemesanan::with(['mobil', 'pembayaran', 'penyewa'])
        ->where('id_penyewa', $user->id_penyewa)
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('pages.riwayat', compact('pemesanans'));
}
}