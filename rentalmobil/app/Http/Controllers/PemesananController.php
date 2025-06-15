<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Mobil;
use App\Models\Penyewa;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    
    public function riwayat()
    {
        $user = Auth::user();
        $pemesanans = Pemesanan::with(['mobil', 'pembayaran'])
            ->where('id_penyewa', $user->id_penyewa)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.riwayat', compact('pemesanans'));
    }
    

public function generateResi($id)
{
    $pemesanan = Pemesanan::with(['penyewa', 'mobil', 'pembayaran'])->findOrFail($id);
    $pdf = PDF::loadView('pdf.resi', compact('pemesanan'));
    return $pdf->download('resi-psn-'.$pemesanan->id_pemesanan.'.pdf');
}

}