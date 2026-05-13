<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Pastikan user sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 2. Bandingkan role user di database dengan role yang diminta di route
        // Jika tidak sesuai, akses akan ditolak (403 Forbidden)
        
        if (auth()->user()->email !== 'admin@del.ac.id') {
            abort(403, 'MAAF, ANDA TIDAK MEMILIKI OTORITAS UNTUK MENGAKSES HALAMAN INI.');
        }
        
        // untuk login admin@del.ac.id
        return $next($request);
    }
}