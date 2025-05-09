<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
{
    $produk = [
        [
            'nama' => 'Toyota Raize',
            'harga' => 250000000,
            'gambar' => 'mobil1.jpg'
        ],
        [
            'nama' => 'Honda HRV',
            'harga' => 280000000,
            'gambar' => 'mobil2.jpg'
        ],
        // Tambahkan produk lainnya di sini
    ];

    return view('pages.section.products', compact('produk'));
}
}