<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    public $timestamps = true;

    protected $fillable = [
        'id_pemesanan',
        'id_penyewa',
        'kode_mobil',
        'total_hari',
        'alamat_pengambilan',
        'total_harga',
        'jumlah_pembayaran',
        'nomor_rekening',
        'bukti_pembayaran_path',
        'status',
    ];

     protected static function boot()
    {
        parent::boot();

        static::updated(function ($pembayaran) {
            $originalStatus = $pembayaran->getOriginal('status');
            $currentStatus = $pembayaran->status;

            // Stok bertambah ketika status berubah menjadi Batal/Selesai
            if (in_array($originalStatus, ['Menunggu', 'Konfirmasi']) && 
                in_array($currentStatus, ['Batal', 'Selesai'])) {
                $mobil = Mobil::where('kode_mobil', $pembayaran->kode_mobil)->first();
                if ($mobil) {
                    $mobil->increment('jumlah');
                }
            }

            // Stok berkurang ketika status berubah menjadi Menunggu/Konfirmasi
            if (in_array($originalStatus, ['Batal', 'Selesai']) && 
                in_array($currentStatus, ['Menunggu', 'Konfirmasi'])) {
                $mobil = Mobil::where('kode_mobil', $pembayaran->kode_mobil)->first();
                if ($mobil && $mobil->jumlah > 0) {
                    $mobil->decrement('jumlah');
                }
            }
        });
    }

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan', 'id_pemesanan');
    }

    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class, 'id_penyewa');
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'kode_mobil');
    }

    public function getBuktiPembayaranUrlAttribute()
    {
        if (!$this->bukti_pembayaran_path) {
            return asset('images/default-payment.png');
        }
        return asset('storage/' . $this->bukti_pembayaran_path);
    }
    
}