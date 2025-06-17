<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil; // Pastikan model di-import

class LandingpageController extends Controller
{
    public function index()
    {
        return view('pages.landingpage');
    }

    




}
