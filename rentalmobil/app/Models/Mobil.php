<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Mobil extends Model
{
    use HasFactory;

    // Nama tabel dan primary key
    protected $table = 'mobil';
    protected $primaryKey = 'kode_mobil';
    protected $keyType = 'string';
    public $incrementing = false;

    // Mass assignment
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

    // Casting tipe data
    protected $casts = [
        'harga_harian' => 'decimal:2',
        'jumlah_kursi' => 'integer',
        'jumlah' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Boot method untuk generate kode mobil otomatis
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($mobil) {
            if (empty($mobil->kode_mobil)) {
                $mobil->kode_mobil = self::generateKodeMobil();
            }
        });

        // Optional: hapus foto saat model dihapus
        static::deleting(function ($mobil) {
            $mobil->deleteFotoFile();
        });
    }

    // Generate kode mobil unik dengan prefix 'vr' dan angka 4 digit
    private static function generateKodeMobil(): string
    {
        $prefix = 'vr';
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

    // Accessor untuk mendapatkan URL foto mobil
    public function getFotoUrlAttribute(): string
    {
        if (!$this->foto) {
            return asset('images/default-car.png');
        }

        $path = public_path('images/' . $this->foto);
        if (File::exists($path)) {
            return asset('images/' . $this->foto);
        }

        return asset('images/default-car.png');
    }

    // Method untuk menghapus file foto dari storage
    public function deleteFotoFile(): void
    {
        if ($this->foto) {
            $path = public_path('images/' . $this->foto);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
    }

    // Method untuk menyimpan foto baru dan menghapus foto lama jika ada
    public function updateFoto($file): void
    {
        $this->deleteFotoFile();

        $imagesPath = public_path('images');
        if (!File::exists($imagesPath)) {
            File::makeDirectory($imagesPath, 0755, true);
        }

        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($imagesPath, $filename);

        $this->foto = $filename;
    }
}
