@extends('layouts.main')

@section('title', 'Beranda')
@section('subtitle', 'Selamat Datang di Inovasi Hayati')

@section('content')
<div class="max-w-7xl mx-auto space-y-20">
    
    <section class="relative rounded-[3rem] overflow-hidden bg-emerald-950 p-12 lg:p-20 shadow-2xl">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-emerald-500/10 blur-[100px] rounded-full"></div>
        
        <div class="grid lg:grid-cols-2 gap-12 items-center relative z-10">
            <div>
                <span class="inline-flex items-center px-4 py-1 rounded-full bg-emerald-400/20 text-emerald-400 text-xs font-black uppercase tracking-tighter mb-6 border border-emerald-400/30">
                    Akreditasi A · BAN-PT 2024
                </span>
                <h2 class="font-serif text-5xl lg:text-7xl text-white leading-tight mb-8">
                    Masa Depan <br> <span class="italic text-emerald-400">Bioteknologi</span> Dimulai Di Sini.
                </h2>
                <p class="text-emerald-100/70 text-lg leading-relaxed mb-10 max-w-md">
                    Menggabungkan kearifan lokal Nusantara dengan sains modern untuk menciptakan solusi global.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="/peminjaman" class="px-8 py-4 bg-emerald-500 text-white rounded-2xl font-bold shadow-lg shadow-emerald-500/20 hover:scale-105 transition active:scale-95">Mulai Riset Sekarang</a>
                    <a href="#kegiatan" class="px-8 py-4 bg-white/10 text-white rounded-2xl font-bold hover:bg-white/20 backdrop-blur-md transition">Lihat Kegiatan</a>
                </div>
            </div>
            
            <div class="hidden lg:grid grid-cols-2 gap-4">
                <div class="space-y-4 pt-12">
                    <img src="https://images.unsplash.com/photo-1579154235602-3c2c2aa59c1c?q=80&w=500" class="rounded-3xl shadow-2xl grayscale hover:grayscale-0 transition duration-500" alt="Lab 1">
                    <div class="p-6 bg-emerald-400 rounded-3xl text-emerald-950">
                        <p class="text-4xl font-black italic">120+</p>
                        <p class="font-bold text-sm uppercase">Mahasiswa Aktif</p>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="p-6 bg-white/10 backdrop-blur-md rounded-3xl text-white border border-white/10">
                        <p class="text-4xl font-black italic">18</p>
                        <p class="font-bold text-sm uppercase">Dosen Ahli</p>
                    </div>
                    <img src="https://images.unsplash.com/photo-1532187875605-186c6af8405c?q=80&w=500" class="rounded-3xl shadow-2xl" alt="Lab 2">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="flex items-end justify-between mb-10">
            <div>
                <h3 class="font-serif text-4xl text-slate-900 mb-2">Laboratorium Kami</h3>
                <p class="text-slate-500">Fasilitas kelas dunia untuk menunjang eksplorasi ilmiah Anda.</p>
            </div>
            <a href="/fasilitas" class="text-emerald-600 font-bold hover:underline flex items-center gap-2">
                Lihat Semua Fasilitas
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </a>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @php
                $labs = [
                    ['Lab Molekuler', '🧬', 'Analisis DNA, RNA, dan Protein tingkat lanjut.'],
                    ['Lab Mikrobiologi', '🦠', 'Kultur murni dan isolasi mikroorganisme.'],
                    ['Lab Bioproses', '🏭', 'Optimasi fermentasi skala pilot industri.'],
                ];
            @endphp
            @foreach($labs as $lab)
            <div class="group bg-white p-8 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50 hover:-translate-y-2 transition duration-300">
                <div class="text-5xl mb-6 group-hover:scale-110 transition duration-300">{{ $lab[1] }}</div>
                <h4 class="text-xl font-bold text-slate-900 mb-2">{{ $lab[0] }}</h4>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">{{ $lab[2] }}</p>
                <div class="h-1 w-0 group-hover:w-full bg-emerald-500 transition-all duration-500"></div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection