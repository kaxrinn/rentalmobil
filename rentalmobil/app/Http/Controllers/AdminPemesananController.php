<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AdminPemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::with('mobil')
            ->orderBy('created_at', 'desc')
            ->paginate(10); // 10 item per halaman

        return view('pages.pemesananadmin', compact('pemesanans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:Menunggu,Konfirmasi,Batal,Selesai'
        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update($validated);

        return back()->with('success', 'Status berhasil diperbarui');
    }

    public function destroy($id)
{
    try {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false], 404);
    }
}
}