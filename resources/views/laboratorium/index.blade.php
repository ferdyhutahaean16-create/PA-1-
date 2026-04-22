@extends('layouts.main')

@section('title', 'Laboratorium Terpadu')

@section('content')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div class="bg-gray-50 py-12 border-b border-gray-200">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-[#1a4a38] mb-3 uppercase tracking-wide">Laboratorium Terpadu</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">Informasi fasilitas riset dan layanan administrasi peminjaman untuk sivitas akademika Program Studi Bioteknologi.</p>
    </div>

<div class="container mx-auto px-6 py-16 max-w-5xl min-h-screen">
    
    <div class="mb-20">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Laboratorium</h2>
            <div class="h-1 w-20 bg-[#1a4a38] mx-auto mt-3 rounded"></div>
        </div>

        @if(isset($labs) && $labs->isEmpty())
            <div class="text-center p-10 bg-white rounded-xl border border-dashed border-gray-300 text-gray-500 italic">
                Belum ada data laboratorium yang ditambahkan.
            </div>
        @elseif(isset($labs))
            <div class="space-y-4">
                @foreach($labs as $index => $lab)
                <div x-data="{ expanded: {{ $index === 0 ? 'true' : 'false' }} }" class="border border-gray-200 rounded-xl bg-white overflow-hidden shadow-sm transition-all duration-300">
                    
                    <button @click="expanded = ! expanded" class="w-full px-6 py-5 flex justify-between items-center bg-white hover:bg-gray-50 transition-colors focus:outline-none text-left">
                        <span class="font-bold text-gray-800 text-lg uppercase tracking-tight">{{ $lab->nama_lab }}</span>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300" :class="{ 'rotate-180': expanded }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div x-show="expanded" x-collapse class="px-6 pb-8 pt-2 border-t border-gray-50">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-4">
                            <div>
                                <h4 class="font-bold text-[#1a4a38] mb-2 text-sm uppercase tracking-wider">Deskripsi Laboratorium</h4>
                                <p class="text-gray-600 text-sm leading-relaxed text-justify mb-6">
                                    {{ $lab->deskripsi ?? 'Informasi deskripsi belum tersedia.' }}
                                </p>
                                
                                <div class="space-y-3 bg-gray-50 p-5 rounded-xl border border-gray-100 shadow-inner">
                                    <div class="flex items-start gap-3">
                                        <div class="mt-1 text-[#1a4a38]"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path></svg></div>
                                        <p class="text-sm text-gray-700"><span class="font-bold block">Kepala Laboratorium:</span> {{ $lab->kepala_lab ?? '-' }}</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <div class="mt-1 text-[#1a4a38]"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg></div>
                                        <p class="text-sm text-gray-700"><span class="font-bold block">Fasilitas Utama:</span> {{ $lab->fasilitas ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                @foreach(['foto', 'foto_2', 'foto_3', 'foto_4'] as $field)
                                    @if($lab->$field)
                                        <img src="{{ asset($lab->$field) }}" class="w-full h-32 md:h-40 object-cover rounded-lg border border-gray-200 shadow-sm">
                                    @else
                                        <div class="w-full h-32 md:h-40 bg-gray-100 rounded-lg border border-dashed border-gray-300 flex items-center justify-center text-gray-400">
                                            <svg class="w-8 h-8 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center p-10 bg-white rounded-xl border border-dashed border-gray-300 text-gray-500 italic">
                Data Laboratorium sedang disiapkan (Variabel $labs belum tersedia).
            </div>
        @endif
    </div>


    <div class="text-center mb-10 pt-10 border-t border-gray-100">
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
    </div>

    <div class="mt-12 text-center bg-blue-50 border border-blue-100 rounded-xl p-6 max-w-2xl mx-auto">
        <h3 class="text-lg font-bold text-blue-800 mb-2">Sudah Mengajukan Permohonan?</h3>
        <p class="text-blue-600 text-sm mb-4">Pantau terus status persetujuan dari Admin atau Laboran menggunakan NIM Anda.</p>
        <a href="{{ route('lab.cek-status') }}" class="inline-block bg-white text-blue-700 font-bold px-6 py-2 rounded-lg border border-blue-200 shadow-sm hover:bg-blue-600 hover:text-white transition-colors text-sm">
            Lacak Status Permohonan Saya
        </a>
    </div>

</div>

<style>
    .text-outline {
        -webkit-text-stroke: 1px rgba(255,255,255,0.5);
        color: transparent;
    }
</style>
@endsection