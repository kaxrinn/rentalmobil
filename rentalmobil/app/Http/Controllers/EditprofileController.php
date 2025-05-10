<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditProfileController extends Controller
{
    public function show()
    {
        return view('pages.editprofile'); // pastikan nama file view sesuai
    }

    public function update(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
        ]);

        // Di sini kamu bisa update ke database, misalnya:
        // $user = auth()->user();
        // $user->update($validated);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
