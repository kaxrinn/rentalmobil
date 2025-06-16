<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    // **Menentukan nama tabel secara eksplisit**
    protected $table = 'ulasan';

    // **Menentukan primary key-nya**
    protected $primaryKey = 'id_ulasan';

    // **Field yang boleh diisi melalui mass assignment**
    protected $fillable = [
        'nama_penyewa',  
        'komentar',     
        'rating'         
    ];

    // **Aktifkan fitur timestamps (created_at dan updated_at)**
    public $timestamps = true;

}
