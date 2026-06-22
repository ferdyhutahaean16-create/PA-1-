<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman form login
    public function login()
    {
        // Jika sudah login, langsung ke halaman admin utama
        if (Auth::check()) {
            
            $userEmail = Auth::user()->email;

            if ($userEmail === 'adminlab@del.ac.id') {
                return redirect('/admin/peminjaman'); 
            }

            return redirect('/admin'); 
        }
        
        return view('auth.login');
    }

    // proses data login
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $userEmail = Auth::user()->email;

            if ($userEmail === 'adminlab@del.ac.id') {
                return redirect()->intended('/admin/peminjaman'); 
            }

            return redirect()->intended('/admin'); 
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}