@extends('layouts.main')

@section('title', 'Laboratorium Terpadu')

@section('content')
<div class="bg-gray-50 py-12 border-b border-gray-200">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-[#1a4a38] mb-3 uppercase tracking-wide">Laboratorium Terpadu</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">Fasilitas riset, praktikum, dan layanan administrasi peminjaman alat serta bahan untuk sivitas akademika Program Studi Bioteknologi.</p>
    </div>
</div>

<div class="container mx-auto px-6 py-16 max-w-5xl min-h-screen">
    
    <div class="text-center mb-10">
        <h2 class="text-2xl font-bold text-gray-800">Layanan Administrasi Lab</h2>
        <div class="h-1 w-20 bg-[#1a4a38] mx-auto mt-3 rounded"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="w-20 h-20 mx-auto bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
            </div>
            <h3 class="text-xl font-bold mb-3 text-gray-900">Peminjaman Alat</h3>
            <p class="text-gray-500 text-sm mb-8 px-4 leading-relaxed">Ajukan permohonan peminjaman peralatan laboratorium untuk keperluan praktikum, pengerjaan tugas akhir, atau penelitian mandiri.</p>
            <a href="{{ route('lab.pinjam-alat') }}" class="inline-block bg-[#1a4a38] text-white px-8 py-3 rounded-xl font-bold shadow-md hover:bg-green-800 transition-colors w-full md:w-auto">
                Isi Form Pinjam Alat
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
            <div class="w-20 h-20 mx-auto bg-purple-50 text-purple-600 rounded-full flex items-center justify-center mb-6 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
            </div>
            <h3 class="text-xl font-bold mb-3 text-gray-900">Pengambilan Bahan</h3>
            <p class="text-gray-500 text-sm mb-8 px-4 leading-relaxed">Ajukan permohonan pengambilan bahan kimia atau bahan habis pakai (BHP) pendukung kegiatan penelitian di laboratorium.</p>
            <a href="{{ route('lab.pinjam-bahan') }}" class="inline-block bg-[#1a4a38] text-white px-8 py-3 rounded-xl font-bold shadow-md hover:bg-green-800 transition-colors w-full md:w-auto">
                Isi Form Bahan
            </a>
        </div>

        </div> <div class="mt-12 text-center bg-blue-50 border border-blue-100 rounded-xl p-6 max-w-2xl mx-auto">
        <h3 class="text-lg font-bold text-blue-800 mb-2">Sudah Mengajukan Permohonan?</h3>
        <p class="text-blue-600 text-sm mb-4">Pantau terus status persetujuan dari Admin atau Laboran menggunakan NIM Anda.</p>
        <a href="{{ route('lab.cek-status') }}" class="inline-block bg-white text-blue-700 font-bold px-6 py-2 rounded-lg border border-blue-200 shadow-sm hover:bg-blue-600 hover:text-white transition-colors text-sm">
            Lacak Status Permohonan Saya
        </a>
    </div>
    </div>
</div>
@endsection