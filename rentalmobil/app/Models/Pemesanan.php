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

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'kode_mobil', 'kode_mobil');
    }
}