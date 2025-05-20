<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingpagebfController extends Controller
{
    public function index()
    {
        return view('pages.landingpagebf');
    }


}