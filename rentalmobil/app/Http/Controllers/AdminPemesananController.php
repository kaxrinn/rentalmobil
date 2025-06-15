<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AdminPemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::with(['penyewa', 'mobil', 'pembayaran'])
                              ->orderBy('created_at', 'desc')
                              ->paginate(10);
        
        return view('pages.pemesananadmin', compact('pemesanans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Konfirmasi,Batal,Selesai'
        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        
        // Update status di pembayaran jika ada relasi
        if($pemesanan->pembayaran) {
            $pemesanan->pembayaran->update(['status' => $request->status]);
        }
        
        // Update status di pemesanan
        $pemesanan->update(['status' => $request->status]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        try {
            $pemesanan = Pemesanan::findOrFail($id);
            $pemesanan->delete();
            
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}