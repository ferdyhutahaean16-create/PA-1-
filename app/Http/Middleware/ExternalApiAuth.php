<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ExternalApiAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // If user already authenticated for pinjam, continue
        if (session()->has('pinjam_user') && session()->has('pinjam_token')) {
            return $next($request);
        }

        // Otherwise redirect to pinjam login page
        return redirect()->route('pinjam.login');
    }
}
