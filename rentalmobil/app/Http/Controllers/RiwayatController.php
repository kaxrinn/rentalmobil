<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        // Ambil riwayat pemesanan user
        $bookings = Auth::user()->bookings()->latest()->get();
        
        return view('history.index', compact('bookings'));
    }
}
