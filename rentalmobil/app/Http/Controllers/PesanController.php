<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    // Menampilkan form hubungi admin untuk user (view: pages/section/contact.blade.php)
    public function form()
    {
        return view('pages.section.contact');
    }

    // Simpan pesan dari form ke database
    public function submit(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        // Simpan data ke database
        Pesan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        // Kembali ke form dengan pesan sukses
        return redirect()->to(url()->previous() . '#Kontak')->with('success', 'Pesan berhasil dikirim!');
    }

    // Menampilkan semua pesan ke admin (view: pages/hubungiadmin.blade.php)
    public function index()
    {
        $pesan = Pesan::latest()->get(); // Urutkan dari yang terbaru
        return view('pages.hubungiadmin', compact('pesan'));
    }

    // Hapus pesan tertentu berdasarkan ID
    public function destroy($id)
    {
        Pesan::destroy($id);
        return redirect()->back()->with('success', 'Pesan berhasil dihapus.');
    }
}
