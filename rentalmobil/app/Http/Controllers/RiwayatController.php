<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RiwayatController extends Controller
{
    public function index()
    {
        try {
            if (!Auth::check()) {
                return redirect()->route('login')->withErrors(['Silakan login terlebih dahulu']);
            }

            $pemesanans = Pemesanan::with('mobil')
                ->where('email', Auth::user()->email)
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('pages.riwayat', compact('pemesanans'));

        } catch (ModelNotFoundException $e) {
            return back()->withErrors(['Data tidak ditemukan']);
            
        } catch (\Exception $e) {
            return back()->withErrors(['Terjadi kesalahan sistem: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $pemesanan = Pemesanan::with('mobil')->findOrFail($id);
            
            if ($pemesanan->email !== Auth::user()->email) {
                abort(403, 'Unauthorized action.');
            }

            return view('pages.riwayat.detail', compact('pemesanan'));

        } catch (ModelNotFoundException $e) {
            abort(404);
            
        } catch (\Exception $e) {
            return back()->withErrors(['Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}