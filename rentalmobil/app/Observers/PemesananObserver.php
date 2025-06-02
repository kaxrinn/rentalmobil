<?php

namespace App\Observers;

use App\Models\Pemesanan;
use App\Models\Mobil;

class PemesananObserver
{
    public function updated(Pemesanan $pemesanan)
    {
        $originalStatus = $pemesanan->getOriginal('status');
        $newStatus = $pemesanan->status;
        
        if (($originalStatus === 'Menunggu' || $originalStatus === 'Konfirmasi') && 
            in_array($newStatus, ['Selesai', 'Batal'])) {
            $mobil = Mobil::where('kode_mobil', $pemesanan->kode_mobil)->first();
            if ($mobil) {
                $mobil->increment('jumlah');
            }
        } elseif (in_array($newStatus, ['Menunggu', 'Konfirmasi']) && 
            !in_array($originalStatus, ['Menunggu', 'Konfirmasi'])) {
            $mobil = Mobil::where('kode_mobil', $pemesanan->kode_mobil)->first();
            if ($mobil && $mobil->jumlah > 0) {
                $mobil->decrement('jumlah');
            }
        }
    }
}