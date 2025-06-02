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
        
        // Debug untuk melihat path foto
        foreach($mobils as $mobil) {
            Log::info('Mobil: ' . $mobil->kode_mobil . ' - Foto: ' . $mobil->foto . ' - URL: ' . $mobil->foto_url);
        }
        
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
                
                // Pastikan direktori public/images ada
                $imagesPath = public_path('images');
                if (!File::exists($imagesPath)) {
                    File::makeDirectory($imagesPath, 0755, true);
                    Log::info('Created images directory: ' . $imagesPath);
                }
                
                // Generate filename yang unik
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                
                // Simpan file langsung ke public/images
                $file->move($imagesPath, $filename);
                
                // Log untuk debugging
                Log::info('File uploaded: ' . $filename . ' to ' . $imagesPath);
                Log::info('File exists: ' . (file_exists($imagesPath . '/' . $filename) ? 'YES' : 'NO'));
                
                $validated['foto'] = $filename;
            }

            // Kode mobil akan auto-generate di model
            $mobil = Mobil::create($validated);
            
            // Debug setelah create
            Log::info('Mobil created: ' . $mobil->kode_mobil . ' with foto: ' . $mobil->foto);
            
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
            
            // Debug info
            $debugInfo = $mobil->debugFotoPath();
            Log::info('Edit mobil debug: ', $debugInfo);
            
            return response()->json([
                'success' => true,
                'data' => $mobil,
                'foto_url' => $mobil->foto_url,
                'debug' => $debugInfo // Hapus ini di production
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error editing mobil: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat data mobil: ' . $e->getMessage(),
                'error' => $e->getMessage()
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
                // Hapus foto lama jika ada
                if ($mobil->foto && file_exists(public_path('images/' . $mobil->foto))) {
                    unlink(public_path('images/' . $mobil->foto));
                    Log::info('Deleted old photo: ' . $mobil->foto);
                }
                
                // Upload foto baru
                $file = $request->file('foto');
                
                // Pastikan direktori ada
                $imagesPath = public_path('images');
                if (!File::exists($imagesPath)) {
                    File::makeDirectory($imagesPath, 0755, true);
                }
                
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($imagesPath, $filename);
                
                Log::info('Updated photo: ' . $filename);
                $validated['foto'] = $filename;
            } else {
                // Jangan update field foto jika tidak ada file baru
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
            
            // Hapus foto jika ada
            if ($mobil->foto && file_exists(public_path('images/' . $mobil->foto))) {
                unlink(public_path('images/' . $mobil->foto));
                Log::info('Deleted photo on destroy: ' . $mobil->foto);
            }
            
            $mobil->delete();

            return redirect()->route('mobiladmin')->with('success', 'Data mobil berhasil dihapus!');

        } catch (\Exception $e) {
            Log::error('Error deleting mobil: ' . $e->getMessage());
            return redirect()->back()
                   ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    // Method tambahan untuk debug
    public function debugStorage()
    {
        $info = [
            'public_images_path' => public_path('images'),
            'images_directory_exists' => file_exists(public_path('images')),
            'images_files' => File::exists(public_path('images')) ? File::files(public_path('images')) : [],
            'default_car_exists' => file_exists(public_path('images/default-car.png'))
        ];
        
        return response()->json($info);
    }

    
    public function apiIndex()
    {
        try {
            $mobils = Mobil::where('jumlah', '>', 0) // Hanya mobil yang tersedia
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

    /**
     * API untuk mendapatkan detail mobil
     */
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
