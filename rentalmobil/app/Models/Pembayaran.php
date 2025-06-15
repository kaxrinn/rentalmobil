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