<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::orderBy('created_at', 'desc')->get();
        return view('pages.mobiladmin', compact('mobils'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'merek' => 'required|max:50',
            'jenis' => 'required|max:50',
            'warna' => 'required|max:30',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'harga_harian' => 'required|numeric|min:0',
            'jumlah_kursi' => 'required|integer|min:1',
            'mesin' => 'required|max:30',
            'jumlah' => 'required|integer|min:1',
            'transmisi' => 'required|max:20'
        ]);

        try {
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $imagesPath = public_path('images');
                
                if (!File::exists($imagesPath)) {
                    File::makeDirectory($imagesPath, 0755, true);
                }
                
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($imagesPath, $filename);
                $validated['foto'] = $filename;
            }

            $mobil = Mobil::create($validated);
            return redirect()->route('mobiladmin')->with('success', 'Data mobil berhasil ditambahkan! Kode: ' . $mobil->kode_mobil);
            
        } catch (\Exception $e) {
            Log::error('Error storing mobil: ' . $e->getMessage());
            return redirect()->back()
                   ->withInput()
                   ->with('error', 'Gagal menambah data: ' . $e->getMessage());
        }
    }

    public function edit($kode_mobil)
    {
        try {
            $mobil = Mobil::where('kode_mobil', $kode_mobil)->firstOrFail();
            return response()->json([
                'success' => true,
                'data' => $mobil,
                'foto_url' => $mobil->foto_url,
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error editing mobil: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat data mobil: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $kode_mobil)
    {
        $mobil = Mobil::where('kode_mobil', $kode_mobil)->firstOrFail();

        $validated = $request->validate([
            'merek' => 'required|max:50',
            'jenis' => 'required|max:50',
            'warna' => 'required|max:30',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'harga_harian' => 'required|numeric|min:0',
            'jumlah_kursi' => 'required|integer|min:1',
            'mesin' => 'required|max:30',
            'jumlah' => 'required|integer|min:1',
            'transmisi' => 'required|max:20'
        ]);

        try {
            if ($request->hasFile('foto')) {
                if ($mobil->foto && file_exists(public_path('images/' . $mobil->foto))) {
                    unlink(public_path('images/' . $mobil->foto));
                }
                
                $file = $request->file('foto');
                $imagesPath = public_path('images');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($imagesPath, $filename);
                $validated['foto'] = $filename;
            } else {
                unset($validated['foto']);
            }

            $mobil->update($validated);
            return redirect()->route('mobiladmin')->with('success', 'Data mobil berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating mobil: ' . $e->getMessage());
            return redirect()->back()
                   ->withInput()
                   ->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy($kode_mobil)
    {
        try {
            $mobil = Mobil::where('kode_mobil', $kode_mobil)->firstOrFail();
            
            if ($mobil->foto && file_exists(public_path('images/' . $mobil->foto))) {
                unlink(public_path('images/' . $mobil->foto));
            }
            
            $mobil->delete();
            return redirect()->route('mobiladmin')->with('success', 'Data mobil berhasil dihapus!');

        } catch (\Exception $e) {
            Log::error('Error deleting mobil: ' . $e->getMessage());
            return redirect()->back()
                   ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function apiIndex()
    {
        try {
            $mobils = Mobil::where('jumlah', '>', 0)
                         ->orderBy('created_at', 'desc')
                         ->get()
                         ->map(function ($mobil) {
                             return [
                                 'kode_mobil' => $mobil->kode_mobil,
                                 'merek' => $mobil->merek,
                                 'jenis' => $mobil->jenis,
                                 'warna' => $mobil->warna,
                                 'transmisi' => $mobil->transmisi,
                                 'foto_url' => $mobil->foto_url,
                                 'harga_harian' => $mobil->harga_harian,
                                 'jumlah_kursi' => $mobil->jumlah_kursi,
                                 'mesin' => $mobil->mesin,
                                 'jumlah' => $mobil->jumlah,
                                 'created_at' => $mobil->created_at->format('Y-m-d H:i:s'),
                             ];
                         });

            return response()->json([
                'success' => true,
                'data' => $mobils
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data mobil',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function apiShow($kode_mobil)
    {
        try {
            $mobil = Mobil::where('kode_mobil', $kode_mobil)->firstOrFail();

            return response()->json([
                'success' => true,
                'data' => [
                    'kode_mobil' => $mobil->kode_mobil,
                    'merek' => $mobil->merek,
                    'jenis' => $mobil->jenis,
                    'warna' => $mobil->warna,
                    'transmisi' => $mobil->transmisi,
                    'foto_url' => $mobil->foto_url,
                    'harga_harian' => $mobil->harga_harian,
                    'jumlah_kursi' => $mobil->jumlah_kursi,
                    'mesin' => $mobil->mesin,
                    'jumlah' => $mobil->jumlah,
                    'created_at' => $mobil->created_at->format('Y-m-d H:i:s'),
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Mobil tidak ditemukan',
                'error' => $e->getMessage()
            ], 404);
        }
    }
}