<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = true;

    protected $fillable = [
        'kode_mobil',
        'id_penyewa',
        'tanggal_pengambilan',
        'tanggal_pengembalian',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Backup jika trigger tidak bekerja
            if (empty($model->id_pemesanan)) {
                $lastId = (int) DB::table('pemesanan')
                    ->selectRaw('MAX(CAST(SUBSTRING(id_pemesanan, 3) AS UNSIGNED)) as last_id')
                    ->value('last_id') ?? 0;
                    
                $model->id_pemesanan = 'PM'.str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
            }
            
            // Force timestamps
            $model->created_at = $model->created_at ?? now();
            $model->updated_at = $model->updated_at ?? now();
        });

        
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'kode_mobil');
    }

    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class, 'id_penyewa');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_pemesanan');
    }

    // Format tanggal untuk tampilan
    public function getFormattedTanggalPengambilanAttribute()
    {
        return \Carbon\Carbon::parse($this->tanggal_pengambilan)->format('d M Y');
    }

    public function getFormattedTanggalPengembalianAttribute()
    {
        return \Carbon\Carbon::parse($this->tanggal_pengembalian)->format('d M Y');
    }
    
}