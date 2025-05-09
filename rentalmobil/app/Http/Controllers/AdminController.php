<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin');
    }

    public function pemesananadmin()
    {
        return view('pages.pemesananadmin');
    }
    public function mobiladmin()
    {
        return view('pages.mobiladmin');
    }
    public function ulasanadmin()
    {
        return view('pages.ulasanadmin');
    }
    public function hubungiadmin()
    {
        return view('pages.hubungiadmin');
    }
}

