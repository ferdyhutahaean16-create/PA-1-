@extends('layouts.main')

@section('title', 'Mahasiswa Berprestasi - Bioteknologi IT Del')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Jost:wght@300;400;500;600&display=swap');

:root {
    --forest: #1a4a38;
    --forest-dark: #0c241c;
    --gold: #c6a54a;
    --soft-bg: #f5f7f6;
}

.font-serif { font-family: 'Cormorant Garamond', serif; }
.font-sans { font-family: 'Jost', sans-serif; }

/* Tab Animation */
.tab-content {
    display: none;
    opacity: 0;
    transform: translateY(15px);
    transition: all 0.5s ease-out;
}
.tab-content.active {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

/* Tab Button Styling */
.tab-btn {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}
.tab-btn.active-tab {
    background: var(--forest);
    color: white;
    box-shadow: 0 10px 20px -5px rgba(26, 74, 56, 0.3);
}

/* Glass Card */
.glass-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 2rem;
}

.hover-gold:hover {
    border-top: 4px solid var(--gold);
    transform: translateY(-8px);
}
</style>

<div class="relative w-[100vw] left-[50%] right-[50%] -ml-[50vw] -mr-[50vw] bg-gray-50 py-10 md:py-12 overflow-hidden border-b border-gray-100"> 
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('Adminlte/dist/img/BGH.jpg') }}"
             alt="Chemistry Background" 
             class="w-full h-full object-cover opacity-30 mix-blend-overlay">
    </div>

    <div class="absolute inset-0 bg-gradient-to-r from-[#1a4a38]/80 to-transparent z-0"></div>

    <div class="relative z-10 container mx-auto px-6 text-center flex flex-col items-center justify-center">
        <p class="text-yellow-500 text-[10px] md:text-xs font-bold tracking-[0.35em] uppercase mb-3">
            Student Hall of Fame
        </p>
        
        <h1 class="text-3xl md:text-4xl font-serif text-white mb-4">
            Mahasiswa Berprestasi
        </h1>
        
        <div class="w-16 h-px bg-yellow-500/50"></div>
    </div>
</div>

<div class="bg-[var(--soft-bg)] py-16 min-h-screen font-sans">
    <div class="container mx-auto px-6 max-w-6xl">
        
        <div class="flex flex-wrap justify-center gap-4 mb-20">
            <button onclick="switchTab('tab-prestasi', this)" class="tab-btn active-tab px-8 py-3 rounded-full font-bold text-xs uppercase tracking-widest border border-gray-200">
                Prestasi & Lomba
            </button>
        </div>

        <div id="tab-prestasi" class="tab-content active">
            <div class="mb-12 flex items-center gap-4">
                <div class="h-[1px] flex-1 bg-gray-200"></div>
                <h2 class="font-serif text-3xl text-[var(--forest-dark)]">Pencapaian Kompetisi</h2>
                <div class="h-[1px] flex-1 bg-gray-200"></div>
            </div>

            @if($prestasi->isEmpty())
                <div class="glass-card p-16 text-center italic text-gray-400">Belum ada data prestasi yang tercatat.</div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($prestasi as $item)
                    <div class="glass-card p-8 hover-gold transition-all duration-300 flex flex-col">
                        
                        {{-- Tingkat & Tahun --}}
                        <div class="flex justify-between items-start mb-6">
                            <span class="bg-[var(--forest)] text-[var(--gold)] text-[9px] font-bold px-3 py-1 rounded-full uppercase tracking-tighter">
                                {{ $item->tingkat ?? 'Nasional' }}
                            </span>
                            <span class="font-serif text-xl text-[var(--gold)]">
                                {{ $item->tahun ?? \Carbon\Carbon::parse($item->tanggal_perolehan)->format('Y') }}
                            </span>
                        </div>
                        
                        {{-- Judul Prestasi --}}
                        <h3 class="font-serif text-2xl text-[var(--forest-dark)] mb-3 leading-snug">
                            {{ $item->nama_prestasi ?? $item->judul_prestasi }}
                        </h3>

                        {{-- Penyelenggara --}}
                        @if($item->penyelenggara)
                            <p class="text-[10px] uppercase tracking-widest font-bold text-gray-400 mb-4">
                                Penyelenggara: <span class="text-[var(--forest)]">{{ $item->penyelenggara }}</span>
                            </p>
                        @endif

                        {{-- Deskripsi (Hanya muncul jika ada) --}}
                        @if($item->deskripsi)
                            <p class="text-gray-600 text-sm leading-relaxed mb-8 flex-1 italic">
                                "{{ $item->deskripsi }}"
                            </p>
                        @else
                            <div class="mb-8 flex-1"></div>
                        @endif
                        
                        {{-- Footer Kartu --}}
                        <div class="flex items-center gap-4 pt-6 border-t border-gray-100 mt-auto">
                            <div class="relative">
                                {{-- Penanganan dua nama kolom foto (foto / bukti_sertifikat) --}}
                                @php
                                    $gambarSertifikat = $item->foto ?? $item->bukti_sertifikat;
                                @endphp

                                @if($gambarSertifikat)
                                    <img src="{{ asset($gambarSertifikat) }}" class="w-12 h-12 rounded-full object-cover border-2 border-[var(--gold)] shadow-sm">
                                @else
                                    <div class="w-12 h-12 rounded-full bg-[var(--forest)] flex items-center justify-center text-[var(--gold)] font-bold text-xs">
                                        {{ substr($item->nama_peraih, 0, 1) }}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <p class="text-sm font-bold text-[var(--forest-dark)]">{{ $item->nama_peraih }}</p>
                                <p class="text-[10px] uppercase text-[var(--gold)] font-bold tracking-widest">Student</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div id="tab-publikasi" class="tab-content">
            <div class="mb-12 flex items-center gap-4">
                <div class="h-[1px] flex-1 bg-gray-200"></div>
                <h2 class="font-serif text-3xl text-[var(--forest-dark)]">Publikasi Riset Mahasiswa</h2>
                <div class="h-[1px] flex-1 bg-gray-200"></div>
            </div>

            @if($publikasi->isEmpty())
                <div class="glass-card p-16 text-center italic text-gray-400">Belum ada data publikasi mahasiswa.</div>
            @else
                <div class="space-y-8">
                    @foreach($publikasi as $pub)
                    <div class="glass-card overflow-hidden flex flex-col md:flex-row hover:shadow-xl transition-all">
                        <div class="md:w-1/4 bg-white/50 p-8 flex items-center justify-center border-b md:border-b-0 md:border-r border-gray-100">
                            @if($pub->gambar)
                                <img src="{{ asset($pub->gambar) }}" class="max-h-40 rounded shadow-md transform -rotate-2">
                            @else
                                <div class="w-32 h-40 bg-gray-100 rounded flex items-center justify-center text-gray-300">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                </div>
                            @endif
                        </div>
                        <div class="md:w-3/4 p-10 flex flex-col justify-center">
                            <div class="flex flex-wrap items-center gap-3 mb-4">
                                <span class="text-[var(--gold)] text-[10px] font-bold uppercase tracking-widest">{{ $pub->tipe_publikasi ?? 'International Journal' }}</span>
                                <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
                                <span class="text-gray-400 text-xs">{{ $pub->tanggal_publikasi }}</span>
                            </div>
                            <h3 class="font-serif text-2xl text-[var(--forest-dark)] mb-4 leading-snug">{{ $pub->judul }}</h3>
                            <p class="text-gray-500 text-sm mb-6">Penulis: <span class="text-[var(--forest)] font-bold italic">{{ $pub->penulis }}</span></p>
                            
                            <div class="flex gap-4">
                                @if($pub->link_view)
                                <a href="{{ $pub->link_view }}" target="_blank" class="text-[10px] font-bold uppercase text-[var(--forest)] flex items-center gap-2 hover:text-[var(--gold)] transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    View Full Paper
                                </a>
                                @endif
                                @if($pub->link_download)
                                <a href="{{ $pub->link_download }}" target="_blank" class="text-[10px] font-bold uppercase text-[var(--forest)] flex items-center gap-2 hover:text-[var(--gold)] transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Download PDF
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div id="tab-tugas" class="tab-content">
            <div class="glass-card p-24 text-center border-dashed border-2 border-gray-200">
                <div class="w-20 h-20 bg-white rounded-full shadow-sm flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-[var(--gold)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="font-serif text-3xl text-[var(--forest-dark)] mb-2">Digital Archive</h3>
                <p class="text-gray-400 italic">Katalog Tugas Akhir mahasiswa sedang dalam tahap kurasi digital.</p>
            </div>
        </div>

    </div>
</div>

<script>
    function switchTab(tabId, btn) {
        // Hide all
        document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
        
        // Reset buttons
        document.querySelectorAll('.tab-btn').forEach(el => {
            el.classList.remove('active-tab', 'text-white');
            el.classList.add('bg-white', 'text-gray-500');
        });

        // Activate
        const target = document.getElementById(tabId);
        target.classList.add('active');
        btn.classList.add('active-tab');
        btn.classList.remove('bg-white', 'text-gray-500');
    }
</script>
@endsection