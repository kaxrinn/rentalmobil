<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id_order';
    public $timestamps = true;

    protected $fillable = [
        'kode_mobil',
        'nama_pemesan',
        'email',
        'no_hp',
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