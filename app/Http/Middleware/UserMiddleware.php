<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->level === 'user') {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
