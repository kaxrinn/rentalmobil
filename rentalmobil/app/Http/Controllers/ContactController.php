<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
        ]);
        
        // Kirim email (opsional)
        // Mail::to('admin@example.com')->send(new ContactFormMail($validated));
        
        return redirect()->back()->with('success', 'Pesan Anda telah terkirim!');
    }
}