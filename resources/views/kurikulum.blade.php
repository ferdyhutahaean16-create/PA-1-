@extends('layouts.main')
@section('title', 'Kurikulum Program Studi - Bioteknologi')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Jost:wght@300;400;500;600&display=swap');

:root {
    --forest: #1a4a38;
    --forest-dark: #0c241c;
    --forest-light: #2f7a5a;
    --gold: #c6a54a;
    --soft-bg: #f5f7f6;
}

body {
    font-family: 'Jost', sans-serif;
    background-color: var(--soft-bg);
}

.font-serif { font-family: 'Cormorant Garamond', serif; }

/* Glassmorphism Cards */
.glass-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.6);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.semester-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(26, 74, 56, 0.08);
}

/* Table Styling */
.premium-table thead {
    background-color: var(--forest);
    color: white;
}

.premium-table th {
    font-family: 'Jost', sans-serif;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    font-size: 0.75rem;
    font-weight: 600;
}

.premium-table tr {
    transition: background-color 0.2s ease;
}

.premium-table tbody tr:hover {
    background-color: rgba(198, 165, 74, 0.05); /* Very light gold */
}

/* Image Accent */
.image-accent {
    position: relative;
}

.image-accent::after {
    content: '';
    position: absolute;
    top: 15px;
    right: -15px;
    width: 100%;
    height: 100%;
    border: 2px solid var(--gold);
    z-index: -1;
    border-radius: 0.5rem;
}

/* Animation */
.fade-up {
    animation: fadeUp 0.8s ease forwards;
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<!-- HEADER SECTION -->
<div class="relative w-full bg-gray-50 py-10 md:py-12 overflow-hidden border-b border-gray-100"> 
    
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1530026405186-ed1f139313f8?q=80&w=1974&auto=format&fit=crop" 
             alt="Biotechnology Background" 
             class="w-full h-full object-cover opacity-10 mix-blend-overlay">
    </div>

    <div class="absolute inset-0 bg-gradient-to-b from-[#0d2a1f]/50 to-transparent z-0"></div>

    <div class="relative z-10 container mx-auto px-6 text-center flex flex-col items-center justify-center">
        <p class="text-yellow-500 text-[10px] md:text-xs font-bold tracking-[0.3em] uppercase mb-3">
            Educational Path
        </p>
        
        <h1 class="text-3xl md:text-4xl font-serif text-white mb-4">
            Kurikulum Akademik
        </h1>
        
        <div class="w-16 h-px bg-yellow-500/40"></div>
    </div>
</div>

<div class="py-16 bg-[var(--soft-bg)] min-h-screen">
    <div class="container mx-auto px-6 max-w-6xl">
        
        <!-- INTRO SECTION -->
        <div class="flex flex-col md:flex-row gap-12 items-center mb-24 fade-up">
            <div class="w-full md:w-5/12">
                <div class="image-accent">
                    <img src="https://via.placeholder.com/600x450?text=Laboratorium+Bioteknologi" alt="Suasana Laboratorium" class="rounded-lg shadow-2xl w-full object-cover">
                </div>
            </div>
            
            <div class="w-full md:w-7/12">
                <h2 class="font-serif text-3xl text-[var(--forest-dark)] mb-6">Membangun Kompetensi Masa Depan</h2>
                <div class="text-gray-700 leading-relaxed text-justify space-y-4">
                    <p class="first-letter:text-5xl first-letter:font-serif first-letter:text-[var(--forest)] first-letter:mr-3 first-letter:float-left">
                        Kurikulum Program Studi Bioteknologi disusun secara visioner untuk menjawab tantangan industri hayati global. Kami memadukan landasan teori yang kuat dengan praktik laboratorium mutakhir, memastikan setiap lulusan memiliki ketajaman analisis dan keterampilan teknis yang mumpuni.
                    </p>
                    <p>
                        Struktur mata kuliah kami dirancang secara bertahap, mulai dari penguatan sains dasar hingga aplikasi bioteknologi spesifik di sektor medis, pertanian, dan lingkungan.
                    </p>
                </div>
            </div>
        </div>

        <!-- CURRICULUM GRID -->
        @if($kurikulum_per_semester->isEmpty())
            <div class="glass-card rounded-[2rem] p-16 text-center">
                <div class="text-[var(--gold)] mb-4">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <p class="text-gray-500 italic font-serif text-xl">Rencana studi sedang dalam tahap finalisasi oleh tim akademik.</p>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                
                @foreach($kurikulum_per_semester as $semester => $matkul)
                    <div class="semester-card glass-card rounded-[2.5rem] overflow-hidden fade-up" style="animation-delay: {{ $loop->index * 0.1 }}s">
                        <!-- Semester Header -->
                        <div class="px-8 py-6 bg-gradient-to-r from-[var(--forest-dark)] to-[var(--forest)] flex justify-between items-center">
                            <h3 class="font-serif text-xl text-white tracking-wide">
                                Semester <span class="text-[var(--gold)] font-bold ml-1">{{ $semester }}</span>
                            </h3>
                            <span class="text-[10px] bg-white/10 text-white/80 px-3 py-1 rounded-full border border-white/20 uppercase tracking-widest">Core Modules</span>
                        </div>
                        
                        <div class="p-2">
                            <table class="w-full premium-table">
                                <thead>
                                    <tr>
                                        <th class="py-4 px-4 text-left">Kode</th>
                                        <th class="py-4 px-4 text-left">Mata Kuliah</th>
                                        <th class="py-4 px-4 text-center">SKS</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach($matkul as $item)
                                        <tr class="border-b border-gray-100 last:border-0">
                                            <td class="py-4 px-4 text-[11px] font-bold text-[var(--forest)] tracking-tighter">{{ $item->kode_mk }}</td>
                                            <td class="py-4 px-4 text-sm leading-snug">{{ $item->mata_kuliah }}</td>
                                            <td class="py-4 px-4 text-center">
                                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gray-50 text-[var(--gold)] font-bold text-xs border border-gray-100">
                                                    {{ $item->sks }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Semester Footer Summary (Optional) -->
                        <div class="px-8 py-4 bg-gray-50/50 border-t border-gray-100 flex justify-end">
                            <p class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Total SKS Semester: <span class="text-[var(--forest)]">{{ $matkul->sum('sks') }}</span></p>
                        </div>
                    </div>
                @endforeach
                
            </div>
        @endif
    </div>
</div>
@endsection