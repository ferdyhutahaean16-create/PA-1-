@extends('layouts.admin.admin')
@section('title', 'Dashboard Admin - Bioteknologi')

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">Selamat Datang di Admin Panel</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500 flex items-center justify-between">
        <div>
            <h3 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-2">Total Dosen</h3>
            <p class="text-3xl font-bold text-gray-800">12</p> </div>
        <div class="text-green-200">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500 flex items-center justify-between">
        <div>
            <h3 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-2">Total Prestasi</h3>
            <p class="text-3xl font-bold text-gray-800">34</p>
        </div>
        <div class="text-blue-200">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500 flex items-center justify-between">
        <div>
            <h3 class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-2">Peminjaman Lab</h3>
            <p class="text-3xl font-bold text-gray-800">5 <span class="text-sm font-normal text-red-500">Pending</span></p>
        </div>
        <div class="text-yellow-200">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
        </div>
    </div>

</div>

<div class="bg-white p-6 rounded-lg shadow-md border border-gray-100">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Aksi Cepat</h2>
    <div class="flex flex-wrap gap-4">
        <a href="{{ route('dosen.create') }}" class="bg-green-600 text-white px-5 py-2.5 rounded hover:bg-green-700 font-bold transition shadow-sm">
            + Tambah Data Dosen
        </a>
        <button class="bg-blue-600 text-white px-5 py-2.5 rounded hover:bg-blue-700 font-bold transition shadow-sm">
            + Tambah Data Prestasi
        </button>
        <button class="bg-gray-800 text-white px-5 py-2.5 rounded hover:bg-gray-900 font-bold transition shadow-sm">
            Cek Peminjaman Alat Lab
        </button>
    </div>
</div>
@endsection