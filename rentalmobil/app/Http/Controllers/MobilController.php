<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class MobilController extends Controller
{
    // Tampilkan halaman list mobil
    public function index()
    {
        $mobils = Mobil::orderBy('created_at', 'desc')->paginate(5);;
        return view('pages.mobiladmin', compact('mobils'));
    }

    // Simpan data mobil baru
    public function store(Request $request)
    {
        $validated = $this->validateMobil($request);

        try {
            $mobil = new Mobil($validated);

            if ($request->hasFile('foto')) {
                $this->updateFoto($mobil, $request->file('foto'));
            }

            $mobil->save();

            return redirect()->route('mobiladmin')->with('success', 'Data mobil berhasil ditambahkan! Kode: ' . $mobil->kode_mobil);

        } catch (\Exception $e) {
            Log::error('Error storing mobil: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menambah data: ' . $e->getMessage());
        }
    }

    // Ambil data mobil untuk edit (AJAX)
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

    // Update data mobil
    public function update(Request $request, $kode_mobil)
{
    $mobil = Mobil::where('kode_mobil', $kode_mobil)->firstOrFail();

    $validated = $this->validateMobil($request, $isUpdate = true);

    unset($validated['foto']); // agar foto tidak tertimpa saat fill

    try {
        $mobil->fill($validated); // ISI data terlebih dahulu

        if ($request->hasFile('foto')) {
            $this->updateFoto($mobil, $request->file('foto'));
        }

        $mobil->save();

        return redirect()->route('mobiladmin')->with('success', 'Data mobil berhasil diperbarui!');
    } catch (\Exception $e) {
        Log::error('Error updating mobil: ' . $e->getMessage());
        return redirect()->back()
            ->withInput()
            ->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
    }
}


    // Hapus data mobil
    public function destroy($kode_mobil)
    {
        try {
            $mobil = Mobil::where('kode_mobil', $kode_mobil)->firstOrFail();

            $mobil->delete(); // otomatis hapus foto via model event

            return redirect()->route('mobiladmin')->with('success', 'Data mobil berhasil dihapus!');

        } catch (\Exception $e) {
            Log::error('Error deleting mobil: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    // API: List mobil dengan jumlah > 0
    public function apiIndex()
    {
        try {
            $mobils = Mobil::where('jumlah', '>', 0)
                ->latest()
                ->get()
                ->map(fn($mobil) => [
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
                ]);

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

    // API: Detail mobil berdasarkan kode
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

    // Fungsi validasi yang dipakai di store dan update
    private function validateMobil(Request $request, bool $isUpdate = false): array
    {
        $rules = [
            'merek' => 'required|max:50',
            'jenis' => 'required|max:50',
            'warna' => 'required|max:30',
            'harga_harian' => 'required|numeric|min:0',
            'jumlah_kursi' => 'required|integer|min:1',
            'mesin' => 'required|max:30',
            'jumlah' => 'required|integer|min:1',
            'transmisi' => 'required|max:20',
        ];

        if ($isUpdate) {
            $rules['foto'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048';
        } else {
            $rules['foto'] = 'required|image|mimes:jpeg,png,jpg|max:2048';
        }

        return $request->validate($rules);
    }

    public function search(Request $request)
    {
        $keyword = $request->search;

        $mobils = Mobil::where('merek', 'like', "%$keyword%")
            ->orWhere('jenis', 'like', "%$keyword%")
            ->get(); // get() langsung semua data

        return view('pages.pencarian', compact('mobils', 'keyword'));
    }
    
    // Fungsi baru untuk update foto
    private function updateFoto(Mobil $mobil, $file): void
    {
        // Hapus foto lama jika ada
        $this->deleteFotoFile($mobil->foto);

        // Simpan foto baru
        $imagesPath = public_path('images');
        if (!File::exists($imagesPath)) {
            File::makeDirectory($imagesPath, 0755, true);
        }

        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($imagesPath, $filename);

        // Update atribut foto di model
        $mobil->foto = $filename;
    }

    // Fungsi baru untuk hapus file foto
    private function deleteFotoFile($filename): void
    {
        if ($filename) {
            $path = public_path('images/' . $filename);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
    }
}