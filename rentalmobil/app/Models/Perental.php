<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Perental extends Authenticatable
{
    protected $table = 'perental';
    protected $primaryKey = 'id_perental';

    protected $fillable = [
        'nama_perental', 'email', 'kata_sandi',
    ];

    protected $hidden = ['kata_sandi'];

    public function getAuthPassword()
    {
        return $this->kata_sandi;
    }
}
