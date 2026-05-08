<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman form login
    public function login()
    {
        // Jika sudah login, langsung tendang ke halaman admin
        if (Auth::check()) {
            return redirect('/admin/testimoni'); // atau rute dashboard admin utama Anda
        }
        return view('auth.login');
    }

    // Memproses data login
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Pengecekan Jalur Berdasarkan Email
            $userEmail = Auth::user()->email;

            if ($userEmail === 'adminlab@del.ac.id') {
                // Jika Admin Lab, arahkan langsung ke halaman tabel peminjaman
                // Sesuaikan '/admin/peminjaman' dengan URL rute tabel peminjaman Anda
                return redirect()->intended('/admin/peminjaman'); 
            }

            // Jika Super Admin (admin@del.ac.id), arahkan ke Dashboard Utama
            return redirect()->intended('/admin'); 
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}