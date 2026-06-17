@extends('layouts.admin.admin')
@section('title', 'Dashboard Utama - Bioteknologi IT Del')

@section('content')
<div class="py-8 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6">
        
        <!-- HEADER DASHBOARD -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Ringkasan Sistem</h1>
                <p class="text-gray-500 mt-1">Selamat datang kembali, <span class="font-bold text-[#22c55e]">{{ Auth::user()->name }}</span>.</p>
            </div>
            <div class="text-right hidden md:block">
                <p class="text-sm font-medium text-gray-400">Status Akses:</p>
                <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-bold uppercase">
                    {{ Auth::user()->role == 'super_admin' ? 'Super Administrator' : 'Admin Laboratorium' }}
                </span>
            </div>
        </div>

        <!-- GRID STATISTIK UTAMA -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            
            <!-- STATISTIK 1: TOTAL DOSEN (KHUSUS SUPER ADMIN) -->
            @if(Auth::user()->role == 'super_admin')
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Dosen</p>
                        <p class="text-3xl font-extrabold text-gray-800">{{ $totalDosen ?? 0 }}</p>
                    </div>
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- STATISTIK 2: TOTAL PRESTASI (KHUSUS SUPER ADMIN) -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Prestasi</p>
                        <p class="text-3xl font-extrabold text-gray-800">{{ $totalPrestasi ?? 0 }}</p>
                    </div>
                    <div class="p-3 bg-amber-50 text-amber-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                </div>
            </div>
            @endif

            <!-- STATISTIK 3: PEMINJAMAN LAB PENDING (SEMUA ADMIN) -->
            <div class="bg-white rounded-2xl shadow-sm border border-red-100 p-6 hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="absolute top-0 left-0 w-full h-1 bg-red-500"></div>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Peminjaman Pending</p>
                        <div class="flex items-baseline gap-2">
                            <p class="text-3xl font-extrabold text-red-600">{{ $peminjamanPending ?? 0 }}</p>
                            <span class="text-xs font-bold text-red-400 animate-pulse">Perlu Respon</span>
                        </div>
                    </div>
                    <div class="p-3 bg-red-50 text-red-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- STATISTIK 4: INVENTARIS LAB (SEMUA ADMIN) -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Status Lab</p>
                        <p class="text-3xl font-extrabold text-emerald-600">Aktif</p>
                    </div>
                    <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- BAGIAN AKSI CEPAT -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- KOLOM AKSI (2/3 LEBAR) -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                        <svg class="w-6 h-6 text-[#1a4a38]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Aksi Cepat Manajemen
                    </h2>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Tombol Peminjaman (Global) -->
                        <a href="{{ route('admin.peminjaman.index') }}" class="group p-4 border border-gray-100 rounded-xl hover:bg-gray-800 transition-all duration-300">
                            <div class="flex items-center gap-4">
                                <div class="p-2 bg-red-50 text-red-600 group-hover:bg-red-500 group-hover:text-white rounded-lg transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 group-hover:text-white">Proses Peminjaman</h4>
                                    <p class="text-xs text-gray-500 group-hover:text-gray-300">Validasi alat & bahan lab</p>
                                </div>
                            </div>
                        </a>

                        <!-- Tombol Dosen (Khusus Super Admin) -->
                        @if(Auth::user()->role == 'super_admin')
                        <a href="{{ route('lecturer.index') }}" class="group p-4 border border-gray-100 rounded-xl hover:bg-[#1a4a38] transition-all duration-300">
                            <div class="flex items-center gap-4">
                                <div class="p-2 bg-emerald-50 text-[#1a4a38] group-hover:bg-emerald-500 group-hover:text-white rounded-lg transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 group-hover:text-white">Update Tenaga Pendidik</h4>
                                    <p class="text-xs text-gray-500 group-hover:text-gray-300">Kelola data dosen & staf</p>
                                </div>
                            </div>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- SIDEBAR DASHBOARD: INFORMASI LOGIN -->
            <div class="lg:col-span-1">
                <div class="bg-[#0f172a] rounded-2xl shadow-xl p-8 text-white relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 opacity-10">
                        <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 bg-emerald-400 rounded-full"></span>
                        Info Sesi
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-xs text-gray-400 uppercase font-bold tracking-widest">Username</p>
                            <p class="text-lg font-medium">{{ Auth::user()->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase font-bold tracking-widest">Waktu Login</p>
                            <p class="text-sm font-medium">{{ date('d M Y, H:i') }} WIB</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection