<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $table = 'pesan'; // Sesuaikan jika nama tabel kamu berbeda

    protected $fillable = [
        'nama',
        'email',
        'pesan',
    ];
}
