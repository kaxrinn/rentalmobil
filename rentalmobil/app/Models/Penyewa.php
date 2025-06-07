<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Penyewa extends Authenticatable
{
    use Notifiable;

    protected $table = 'penyewa'; // Pastikan nama tabel di database adalah 'penyewa'

    protected $fillable = [
        'name',
        'email',
        'phone',
        'ktp',
        'alamat',
        'password',
        
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
