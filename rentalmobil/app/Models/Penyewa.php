<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Penyewa extends Authenticatable
{
    use Notifiable;

    protected $table = 'penyewa';
    protected $primaryKey = 'id_penyewa';

    protected $fillable = [
        'nama_penyewa',
        'email',
        'kata_sandi',
        'nomor_telepon',
        // tambahkan kolom lain kalau perlu
    ];
    
    public function pemesanans()
{
    return $this->hasMany(Pemesanan::class, 'id_penyewa');
}

    protected $hidden = ['kata_sandi'];

    // Laravel expects "password" field by default
    public function getAuthPassword()
    {
        return $this->kata_sandi;
    }
}
