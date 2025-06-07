<?php

// app/Http/Middleware/AuthPerental.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthPerental
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('perental')->check()) {
            return redirect()->route('loginpage');
        }
        return $next($request);
    }
}

