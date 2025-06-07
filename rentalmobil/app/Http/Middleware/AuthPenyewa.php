<?php

// app/Http/Middleware/AuthPenyewa.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthPenyewa
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('penyewa')->check()) {
            return redirect()->route('loginpage');
        }
        return $next($request);
    }
}
