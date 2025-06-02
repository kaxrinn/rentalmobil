<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobil';
    protected $primaryKey = 'kode_mobil';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'kode_mobil',
        'merek',
        'jenis',
        'warna',
        'transmisi',
        'foto',
        'harga_harian',
        'jumlah_kursi',
        'mesin',
        'jumlah'
    ];

    protected $casts = [
        'harga_harian' => 'decimal:2',
        'jumlah_kursi' => 'integer',
        'jumlah' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($mobil) {
            if (empty($mobil->kode_mobil)) {
                $mobil->kode_mobil = self::generateKodeMobil();
            }
        });
    }

    private static function generateKodeMobil()
    {
        $prefix = 'MB';
        $lastMobil = self::where('kode_mobil', 'like', $prefix . '%')
                        ->orderBy('kode_mobil', 'desc')
                        ->first();
        
        if ($lastMobil) {
            $lastNumber = intval(substr($lastMobil->kode_mobil, 2));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        
        return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }

    public function getFotoUrlAttribute()
    {
        if (!$this->foto) {
            return asset('images/default-car.png');
        }
        
        if (file_exists(public_path('images/' . $this->foto))) {
            return asset('images/' . $this->foto);
        }
        
        return asset('images/default-car.png');
    }
}