<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Mobil;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PemesananController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_mobil' => 'required|exists:mobil,kode_mobil',
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'pickup_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after:pickup_date',
            'alamat_pengambilan' => 'required',
            'nomor_rekening' => 'required',
            'ktp' => 'required|file|mimes:jpeg,png,pdf|max:2048',
            'payment_proof' => 'required|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Cek stok mobil
            $mobil = Mobil::where('kode_mobil', $request->kode_mobil)->firstOrFail();
            if ($mobil->jumlah <= 0) {
                return response()->json([
                    'success' => false,
                    'errors' => ['kode_mobil' => ['Stok mobil habis, tidak dapat melakukan pemesanan']]
                ], 422);
            }

            // Simpan file
            $ktpPath = $request->file('ktp')->store('public/ktp');
            $paymentPath = $request->file('payment_proof')->store('public/payments');

            // Hitung harga
            $days = \Carbon\Carbon::parse($request->pickup_date)
                ->diffInDays($request->return_date) + 1;
            
            // Create order
            $pemesanan = Pemesanan::create([
                'kode_mobil' => $request->kode_mobil,
                'nama_penyewa' => $request->nama,
                'email' => $request->email,
                'nomor_telepon' => $request->phone,
                'alamat' => $request->address,
                'tanggal_pengambilan' => $request->pickup_date,
                'tanggal_pengembalian' => $request->return_date,
                'total_hari' => $days,
                'total_harga' => $days * $mobil->harga_harian,
                'alamat_pengambilan' => $request->alamat_pengambilan,
                'nomor_rekening' => $request->nomor_rekening,
                'ktp_path' => str_replace('public/', '', $ktpPath),
                'bukti_pembayaran_path' => str_replace('public/', '', $paymentPath),
                'status' => 'Menunggu',
            ]);

            // Kurangi stok mobil
            $mobil->decrement('jumlah');

            return response()->json([
                'success' => true,
                'data' => $pemesanan,
                'message' => 'Pemesanan berhasil!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}