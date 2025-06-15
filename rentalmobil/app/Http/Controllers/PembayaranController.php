<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\Mobil;
use App\Models\Penyewa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PembayaranController extends Controller
{
   public function processPayment(Request $request)
{
    DB::beginTransaction();
    try {
        $user = Auth::user();
        $mobil = Mobil::where('kode_mobil', $request->kode_mobil)->firstOrFail();

        // Hitung durasi dan total
        $days = Carbon::parse($request->pickup_date)
            ->diffInDays(Carbon::parse($request->return_date)) + 1;
        $totalPrice = $days * $mobil->harga_harian;

        // Method 1: Gunakan create dengan force fill
        $pemesanan = Pemesanan::forceCreate([
            'kode_mobil' => $request->kode_mobil,
            'id_penyewa' => $user->id_penyewa,
            'tanggal_pengambilan' => $request->pickup_date,
            'tanggal_pengembalian' => $request->return_date,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Method 2: Jika Method 1 gagal, gunakan DB langsung
        /*
        $pemesananId = DB::table('pemesanan')->insertGetId([
            'kode_mobil' => $request->kode_mobil,
            'id_penyewa' => $user->id_penyewa,
            'tanggal_pengambilan' => $request->pickup_date,
            'tanggal_pengembalian' => $request->return_date,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $pemesanan = Pemesanan::find($pemesananId);
        */

        if (empty($pemesanan->id_pemesanan)) {
            throw new \Exception('Trigger gagal generate ID pemesanan');
        }

        // Simpan pembayaran
        $paymentPath = $request->file('payment_proof')->store('payments', 'public');
        
        Pembayaran::create([
            'id_pemesanan' => $pemesanan->id_pemesanan,
            'id_penyewa' => $user->id_penyewa,
            'kode_mobil' => $request->kode_mobil,
            'total_hari' => $days,
            'total_harga' => $totalPrice,
            'alamat_pengambilan' => $request->alamat_pengambilan,
            'nomor_rekening' => $request->nomor_rekening,
            'bukti_pembayaran_path' => $paymentPath,
            'status' => 'Menunggu',
        ]);

        DB::commit();

        return response()->json([
            'success' => true,
            'redirect' => route('riwayat'),
            'message' => 'Pembayaran berhasil diproses!'
        ]);

    } catch (\Exception $e) {
        DB::rollBack();
        \Log::error('Payment Error: '.$e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan: '.$e->getMessage()
        ], 500);
    }
}}