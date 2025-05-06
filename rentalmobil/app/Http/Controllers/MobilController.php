<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index()
    {
        // Kamu bisa load data dari database di sini kalau perlu.
        return view('mobil');
    }
}
