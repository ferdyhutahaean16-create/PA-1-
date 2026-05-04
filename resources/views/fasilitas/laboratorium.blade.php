@extends('layouts.main')

@section('title', 'Fasilitas Laboratorium Bioteknologi')

@section('content')
<!-- Tailwind & Font Configuration -->
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: { 'jakarta': ['Plus Jakarta Sans', 'sans-serif'] },
                colors: {
                    'biotech-green': '#15803d',
                    'biotech-dark': '#064e3b',
                    'biotech-light': '#f0fdf4',
                    'biotech-accent': '#facc15',
                }
            }
        }
    }
</script>

<style>
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
    .glass-card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    .gradient-green {
        background: linear-gradient(135deg, #15803d 0%, #064e3b 100%);
    }
</style>

<div class="bg-biotech-light min-h-screen py-16 px-4">
    <div class="max-w-7xl mx-auto">
        
        <!-- Header Section -->
        <div class="mb-16 text-center md:text-left">
            <div class="inline-block bg-biotech-green/10 text-biotech-green px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest mb-4">
                Research & Innovation
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-biotech-dark mb-4">Fasilitas Laboratorium</h2>
            <div class="h-1.5 w-24 bg-biotech-accent rounded-full mb-6 mx-auto md:mx-0"></div>
            <p class="text-slate-600 text-lg max-w-2xl leading-relaxed">
                Mendukung digitalisasi laboratorium untuk mengurangi penggunaan kertas melalui sistem manajemen fasilitas yang terintegrasi dengan standar keamanan tinggi.
            </p>
        </div>

        <!-- Labs Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            
            <!-- Lab Card 1: Mikrobiologi -->
            <div class="group glass-card rounded-[2.5rem] overflow-hidden shadow-soft hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="h-56 gradient-green relative overflow-hidden">
                    <!-- Decorative Icon -->
                    <div class="absolute inset-0 opacity-10 scale-150 rotate-12 group-hover:rotate-0 transition-transform duration-700">
                        <svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                    </div>
                    <div class="absolute bottom-8 left-8 text-white">
                        <span class="bg-biotech-accent text-biotech-dark text-[10px] font-black px-3 py-1 rounded-full uppercase mb-3 inline-block">Biosafety Level 2</span>
                        <h3 class="text-3xl font-bold font-serif leading-tight">Mikrobiologi</h3>
                    </div>
                </div>
                <div class="p-10">
                    <p class="text-slate-600 mb-8 leading-relaxed text-sm">
                        Pusat analisis mikroorganisme dan sterilisasi. Dilengkapi dengan fasilitas kultur jaringan modern untuk riset biomolekuler yang presisi.
                    </p>
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Status: Fasilitas Lengkap</span>
                    </div>
                    <button class="group w-full py-4 bg-white border-2 border-biotech-green text-biotech-green hover:bg-biotech-green hover:text-white rounded-2xl font-extrabold transition-all duration-300 flex items-center justify-center gap-2 shadow-sm">
                        <span>DETAIL FASILITAS ALAT</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </div>

            <!-- Lab Card 2: Rekayasa Genetika -->
            <div class="group glass-card rounded-[2.5rem] overflow-hidden shadow-soft hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="h-56 bg-gradient-to-br from-teal-700 to-biotech-dark relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10 scale-150 -rotate-12 group-hover:rotate-0 transition-transform duration-700">
                        <svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24"><path d="M10.59 13.41L13.17 16l-2.58 2.59c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0L16 16.01l3.59 3.59c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L17.41 14.6l2.58-2.59c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0L15 13.59l-3.59-3.59c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41z"/></svg>
                    </div>
                    <div class="absolute bottom-8 left-8 text-white">
                        <span class="bg-biotech-accent text-biotech-dark text-[10px] font-black px-3 py-1 rounded-full uppercase mb-3 inline-block">High Technology</span>
                        <h3 class="text-3xl font-bold font-serif leading-tight">Rekayasa Genetika</h3>
                    </div>
                </div>
                <div class="p-10">
                    <p class="text-slate-600 mb-8 leading-relaxed text-sm">
                        Laboratorium tingkat lanjut yang dilengkapi mesin PCR System, Elektroforesis, dan Imaging DNA terbaru untuk pemetaan genetik yang akurat.
                    </p>
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 rounded-full bg-amber-50 flex items-center justify-center text-amber-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Status: Akses Terbatas</span>
                    </div>
                    <button class="group w-full py-4 bg-white border-2 border-teal-700 text-teal-700 hover:bg-teal-700 hover:text-white rounded-2xl font-extrabold transition-all duration-300 flex items-center justify-center gap-2 shadow-sm">
                        <span>DETAIL FASILITAS ALAT</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </div>

            <!-- Lab Card 3 (Wildcard: Bioproses/Kimia) -->
            <div class="group glass-card rounded-[2.5rem] overflow-hidden shadow-soft hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 lg:block">
                <div class="h-56 bg-gradient-to-br from-biotech-green to-teal-900 relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10 scale-150 rotate-45 group-hover:rotate-0 transition-transform duration-700">
                        <svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/></svg>
                    </div>
                    <div class="absolute bottom-8 left-8 text-white">
                        <span class="bg-biotech-accent text-biotech-dark text-[10px] font-black px-3 py-1 rounded-full uppercase mb-3 inline-block">Bioprocess Design</span>
                        <h3 class="text-3xl font-bold font-serif leading-tight">Bioproses</h3>
                    </div>
                </div>
                <div class="p-10">
                    <p class="text-slate-600 mb-8 leading-relaxed text-sm">
                        Berfokus pada pengembangan produk skala industri melalui optimasi bioreaktor dan pemisahan produk hilir (downstream processing).
                    </p>
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Status: Siap Digunakan</span>
                    </div>
                    <button class="group w-full py-4 bg-white border-2 border-biotech-dark text-biotech-dark hover:bg-biotech-dark hover:text-white rounded-2xl font-extrabold transition-all duration-300 flex items-center justify-center gap-2 shadow-sm">
                        <span>DETAIL FASILITAS ALAT</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection