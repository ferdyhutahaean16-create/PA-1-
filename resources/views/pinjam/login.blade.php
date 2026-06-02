@extends('layouts.main')

@section('content')
<div class="min-h-[75vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50/30">
    
    <div class="max-w-md w-full bg-white p-8 rounded-3xl shadow-xl shadow-[#1a4a38]/5 border border-gray-100">

        {{-- Bagian Header & Ikon --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-[#1a4a38]/10 mb-4">
                <svg class="w-8 h-8 text-[#1a4a38]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Login Peminjaman</h2>
            <p class="text-sm text-gray-500 mt-2">Silakan masuk menggunakan akun Anda untuk memproses peminjaman.</p>
        </div>

        {{-- Pesan Eror (Jika Gagal Login) --}}
        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-6 flex items-start gap-3 text-sm">
                <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-medium">{{ $errors->first() }}</span>
            </div>
        @endif

        {{-- Form Login --}}
        <form action="{{ route('pinjam.login.post') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Input Username --}}
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Username</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <input type="text" name="username" class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:ring-2 focus:ring-[#1a4a38]/20 focus:border-[#1a4a38] outline-none transition-all" placeholder="Masukkan username..." required autofocus>
                </div>
            </div>

            {{-- Input Password --}}
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                    </div>
                    <input type="password" name="password" class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:ring-2 focus:ring-[#1a4a38]/20 focus:border-[#1a4a38] outline-none transition-all" placeholder="••••••••" required>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="pt-4 flex flex-col gap-3">
                <button type="submit" class="w-full bg-[#1a4a38] hover:bg-[#0f2e22] text-white font-bold py-3.5 px-4 rounded-xl transition-all shadow-md hover:shadow-lg flex justify-center items-center gap-2">
                    <span>Masuk Sekarang</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>

                <a href="/" class="w-full text-center py-3 px-4 text-sm font-bold text-gray-500 hover:text-[#1a4a38] hover:bg-gray-50 rounded-xl transition-all">
                    Batal & Kembali ke Beranda
                </a>
            </div>
        </form>

    </div>
</div>
@endsection