<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'id_penyewaan';
    public $timestamps = true;

    protected $fillable = [
        'kode_mobil',
        'nama_penyewa',
        'email',
        'nomor_telepon',
        'alamat',
        'tanggal_pengambilan',
        'tanggal_pengembalian',
        'total_hari',
        'total_harga',
        'alamat_pengambilan',
        'nomor_rekening',
        'ktp_path',
        'bukti_pembayaran_path',
        'status',
    ];

    protected static function booted()
    {
        static::updated(function ($pemesanan) {
            $originalStatus = $pemesanan->getOriginal('status');
            $newStatus = $pemesanan->status;
            
            // Handle pengurangan/penambahan stok mobil
            if (($originalStatus === 'Menunggu' || $originalStatus === 'Konfirmasi') && 
                in_array($newStatus, ['Selesai', 'Batal'])) {
                // Tambah kembali stok mobil
                $mobil = Mobil::where('kode_mobil', $pemesanan->kode_mobil)->first();
                if ($mobil) {
                    $mobil->increment('jumlah');
                }
            } elseif (in_array($newStatus, ['Menunggu', 'Konfirmasi']) && 
                !in_array($originalStatus, ['Menunggu', 'Konfirmasi'])) {
                // Kurangi stok mobil
                $mobil = Mobil::where('kode_mobil', $pemesanan->kode_mobil)->first();
                if ($mobil && $mobil->jumlah > 0) {
                    $mobil->decrement('jumlah');
                }
            }
        });
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'kode_mobil', 'kode_mobil');
    }
}