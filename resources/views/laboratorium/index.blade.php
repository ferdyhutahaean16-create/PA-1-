@extends('layouts.main')

@section('title', 'Peminjaman Lab')
@section('subtitle', 'Sistem Manajemen Fasilitas Lab')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="grid lg:grid-cols-3 gap-12 items-start">
        
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-emerald-600 rounded-[2rem] p-8 text-white shadow-2xl shadow-emerald-200">
                <h4 class="text-xl font-bold mb-4">Informasi Penting</h4>
                <ul class="text-sm space-y-4 text-emerald-100">
                    <li class="flex gap-3">
                        <span class="h-5 w-5 rounded-full bg-emerald-500 flex items-center justify-center font-bold text-[10px]">1</span>
                        Ajukan peminjaman H-3 sebelum penggunaan.
                    </li>
                    <li class="flex gap-3">
                        <span class="h-5 w-5 rounded-full bg-emerald-500 flex items-center justify-center font-bold text-[10px]">2</span>
                        Wajib melampirkan izin dari Dosen Pembimbing.
                    </li>
                </ul>
            </div>
            
            <div class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-xl">
                <h4 class="font-bold text-slate-900 mb-4">Lacak Status</h4>
                <p class="text-sm text-slate-500 mb-4">Masukkan NIM untuk cek status pengajuan Anda.</p>
                <div class="relative">
                    <input type="text" class="w-full bg-slate-50 border-slate-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500" placeholder="Cari NIM...">
                    <button class="absolute right-2 top-2 p-1.5 bg-emerald-100 text-emerald-700 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" /></svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 bg-white rounded-[2.5rem] p-8 md:p-12 shadow-2xl shadow-slate-200 border border-slate-100">
            <h3 class="font-serif text-3xl mb-8">Formulir Pengajuan</h3>
            
            <form action="#" class="space-y-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-tighter text-slate-400 ml-2">Nama Lengkap</label>
                        <input type="text" class="w-full bg-slate-50 border-none rounded-2xl p-4 ring-1 ring-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none transition" placeholder="Sesuai KTM">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-tighter text-slate-400 ml-2">NIM</label>
                        <input type="text" class="w-full bg-slate-50 border-none rounded-2xl p-4 ring-1 ring-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none transition" placeholder="12S210XX">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-tighter text-slate-400 ml-2">Alat/Bahan yang Dibutuhkan</label>
                    <select class="w-full bg-slate-50 border-none rounded-2xl p-4 ring-1 ring-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none transition appearance-none">
                        <option>Mikroskop Cahaya Binokuler</option>
                        <option>PCR Thermal Cycler</option>
                        <option>Spektrofotometer UV-Vis</option>
                    </select>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-tighter text-slate-400 ml-2">Tanggal Pinjam</label>
                        <input type="date" class="w-full bg-slate-50 border-none rounded-2xl p-4 ring-1 ring-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-black uppercase tracking-tighter text-slate-400 ml-2">Tanggal Kembali</label>
                        <input type="date" class="w-full bg-slate-50 border-none rounded-2xl p-4 ring-1 ring-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                </div>

                <button class="w-full py-5 bg-emerald-600 text-white font-black rounded-2xl shadow-xl shadow-emerald-200 hover:bg-emerald-700 hover:-translate-y-1 transition duration-300">
                    SUBMIT PERMOHONAN
                </button>
            </form>
        </div>
    </div>
</div>
@endsection