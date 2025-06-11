<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Penyewa;

class LupaKataSandiController extends Controller
{
    public function showResetForm()
    {
        return view('pages.lupa_kata_sandi');
    }

    public function resetPasswordManual(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:penyewa,email',
            'kata_sandi' => 'required|min:6|confirmed',
        ]);

        $penyewa = Penyewa::where('email', $request->email)->first();
        $penyewa->kata_sandi = Hash::make($request->kata_sandi);
        $penyewa->save();

        return redirect()->route('loginpage')->with('success', 'Kata sandi berhasil diperbarui!');
    }
}
