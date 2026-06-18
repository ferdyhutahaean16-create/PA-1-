@extends('layouts.admin.admin')
@section('title', 'Dashboard Utama - Bioteknologi IT Del')

@section('content')
<div class="py-10 bg-[#f8fafc] min-h-screen">
    <div class="container mx-auto px-8 max-w-7xl">
        
        <div class="mb-10 flex justify-between items-end">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Ringkasan Sistem</h1>
                <p class="text-gray-500 mt-2 text-sm">Selamat datang kembali, <span class="font-bold text-[#1a4a38]">{{ Auth::user()->name }}</span>. Berikut adalah laporan hari ini.</p>
            </div>
            <div class="text-right hidden md:block">
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1.5">Status Akses</p>
                <span class="px-4 py-1.5 bg-emerald-50 text-emerald-700 rounded-full text-xs font-extrabold uppercase border border-emerald-100">
                    {{ Auth::user()->role == 'super_admin' ? 'Super Administrator' : 'Admin Laboratorium' }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            
            @if(Auth::user()->role == 'super_admin')
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Dosen</p>
                        <p class="text-3xl font-black text-gray-800">{{ $totalDosen ?? 0 }}</p>
                    </div>
                    <div class="p-3 bg-blue-50 text-blue-500 rounded-xl">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Prestasi</p>
                        <p class="text-3xl font-black text-gray-800">{{ $totalPrestasi ?? 0 }}</p>
                    </div>
                    <div class="p-3 bg-amber-50 text-amber-500 rounded-xl">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                </div>
            </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-red-400"></div>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Pinjam Pending</p>
                        <div class="flex items-baseline gap-2">
                            <p class="text-3xl font-black text-red-500">{{ $peminjamanPending ?? 0 }}</p>
                        </div>
                    </div>
                    <div class="p-3 bg-red-50 text-red-400 rounded-xl">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Status Lab</p>
                        <p class="text-3xl font-black text-emerald-500">Aktif</p>
                    </div>
                    <div class="p-3 bg-emerald-50 text-emerald-500 rounded-xl">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                    
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-emerald-50 rounded-lg text-emerald-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800">Aksi Cepat Manajemen</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        
                        <a href="{{ route('admin.peminjaman.index') }}" class="group p-5 bg-white border border-gray-100 rounded-2xl hover:shadow-md transition-all duration-300">
                            <div class="flex items-center gap-4">
                                <div class="p-3 bg-gray-50 text-gray-400 rounded-xl border border-gray-100 group-hover:bg-emerald-50 group-hover:text-emerald-500 transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 group-hover:text-emerald-600 transition-colors">Proses Peminjaman</h4>
                                    <p class="text-xs text-gray-400 mt-0.5">Validasi alat & bahan lab</p>
                                </div>
                            </div>
                        </a>

                        @if(Auth::user()->role == 'super_admin')
                        <a href="{{ route('lecturer.index') }}" class="group p-5 bg-white border border-gray-100 rounded-2xl hover:shadow-md transition-all duration-300">
                            <div class="flex items-center gap-4">
                                <div class="p-3 bg-gray-50 text-gray-400 rounded-xl border border-gray-100 group-hover:bg-emerald-50 group-hover:text-emerald-500 transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 group-hover:text-emerald-600 transition-colors">Update Data Dosen</h4>
                                    <p class="text-xs text-gray-400 mt-0.5">Kelola staf & pendidik</p>
                                </div>
                            </div>
                        </a>
                        @endif

                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-[#0f7654] rounded-2xl shadow-lg p-8 text-white h-full flex flex-col justify-center">
                    <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 bg-emerald-300 rounded-full"></span>
                        Sesi Aktif
                    </h3>
                    
                    <div class="space-y-5 bg-[#0a5c40] p-5 rounded-xl border border-emerald-800">
                        <div>
                            <p class="text-[10px] text-emerald-200 uppercase font-bold tracking-widest">Akun Pengguna</p>
                            <p class="text-base font-bold mt-1">{{ Auth::user()->name }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-emerald-200 uppercase font-bold tracking-widest">Waktu Login Lokal</p>
                            <p class="text-sm font-medium mt-1 flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ date('d M Y, H:i') }} WIB
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection