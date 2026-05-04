@extends('layouts.main')

@section('title', 'Prestasi & Publikasi Dosen - Bioteknologi IT Del')

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

/* Tab System */
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

.tab-btn {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}
.tab-btn.active-tab {
    background: var(--forest);
    color: white;
    box-shadow: 0 10px 25px -5px rgba(26, 74, 56, 0.3);
}

/* Glass Cards */
.glass-card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 2.5rem;
}

.award-card {
    transition: all 0.3s ease;
    border-top: 4px solid transparent;
}
.award-card:hover {
    border-top: 4px solid var(--gold);
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.05);
}

.journal-cover {
    box-shadow: 10px 10px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}
.journal-card:hover .journal-cover {
    transform: scale(1.05) rotate(-2deg);
}
</style>

<!-- HEADER SECTION -->
<div class="relative w-full bg-[var(--forest-dark)] overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>
    <div class="relative z-10 py-24 text-center px-6">
        <span class="inline-block text-[var(--gold)] tracking-[0.5em] uppercase text-[10px] font-bold mb-4">Faculty Honors & Research</span>
        <h1 class="font-serif text-5xl md:text-6xl text-white font-light tracking-tight">Dosen Berprestasi</h1>
        <div class="w-24 h-[1px] bg-[var(--gold)] mx-auto mt-8 opacity-60"></div>
    </div>
</div>

<div class="bg-[var(--soft-bg)] py-16 min-h-screen font-sans">
    <div class="container mx-auto px-6 max-w-6xl">
        
        <!-- TAB NAVIGATION -->
        <div class="flex flex-wrap justify-center gap-4 mb-20">
            <button onclick="switchTab('tab-prestasi', this)" class="tab-btn active-tab px-10 py-3.5 rounded-full font-bold text-xs uppercase tracking-widest border border-gray-200">
                Penghargaan & Prestasi
            </button>
            <button onclick="switchTab('tab-publikasi', this)" class="tab-btn bg-white text-gray-500 px-10 py-3.5 rounded-full font-bold text-xs uppercase tracking-widest border border-gray-200 hover:bg-gray-50">
                Publikasi Ilmiah
            </button>
        </div>

        <!-- TAB: PENGHARGAAN -->
        <div id="tab-prestasi" class="tab-content active">
            <div class="mb-16 text-center">
                <h2 class="font-serif text-4xl text-[var(--forest-dark)] mb-4">Rekognisi & Penghargaan</h2>
                <p class="text-gray-500 italic">Apresiasi atas dedikasi pengajaran dan kontribusi ilmiah tenaga pendidik.</p>
            </div>

            @if($prestasi->isEmpty())
                <div class="glass-card p-20 text-center italic text-gray-400">Belum ada data penghargaan dosen yang tercatat.</div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($prestasi as $item)
                    <div class="glass-card p-8 award-card flex flex-col">
                        <div class="flex justify-between items-start mb-6">
                            <span class="bg-[var(--forest)] text-[var(--gold)] text-[9px] font-bold px-3 py-1 rounded-full uppercase tracking-tighter">
                                {{ $item->tingkat ?? 'Excellence' }}
                            </span>
                            <span class="font-serif text-2xl text-[var(--gold)]/40 font-bold tracking-tighter">{{ $item->tahun }}</span>
                        </div>
                        
                        <h3 class="font-serif text-2xl text-[var(--forest-dark)] mb-4 leading-snug">{{ $item->judul_prestasi }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-8 flex-1">"{{ $item->deskripsi }}"</p>
                        
                        <div class="flex items-center gap-4 pt-6 border-t border-gray-100 mt-auto">
                            @if($item->foto)
                                <img src="{{ asset($item->foto) }}" class="w-12 h-12 rounded-xl object-cover border-2 border-white shadow-sm">
                            @else
                                <div class="w-12 h-12 rounded-xl bg-[var(--forest-dark)] flex items-center justify-center text-[var(--gold)] font-bold text-xs">
                                    {{ substr($item->nama_peraih, 0, 1) }}
                                </div>
                            @endif
                            <div>
                                <p class="text-sm font-bold text-[var(--forest-dark)]">{{ $item->nama_peraih }}</p>
                                <p class="text-[10px] uppercase text-[var(--gold)] font-bold tracking-widest">Faculty Member</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- TAB: PUBLIKASI -->
        <div id="tab-publikasi" class="tab-content">
            <div class="mb-16 text-center">
                <h2 class="font-serif text-4xl text-[var(--forest-dark)] mb-4">Publikasi Ilmiah</h2>
                <p class="text-gray-500 italic">Diseminasi hasil riset dan inovasi dalam jurnal bereputasi.</p>
            </div>

            @if($publikasi->isEmpty())
                <div class="glass-card p-20 text-center italic text-gray-400">Belum ada data publikasi ilmiah dosen.</div>
            @else
                <div class="space-y-10">
                    @foreach($publikasi as $pub)
                    <div class="glass-card journal-card overflow-hidden flex flex-col md:flex-row hover:shadow-2xl transition-all duration-500">
                        <!-- Left: Visual/Cover -->
                        <div class="md:w-1/3 bg-white/40 p-10 flex items-center justify-center border-b md:border-b-0 md:border-r border-gray-100">
                            @if($pub->gambar)
                                <img src="{{ asset($pub->gambar) }}" class="journal-cover max-h-56 rounded border border-gray-200">
                            @else
                                <div class="w-40 h-56 bg-white rounded shadow-inner flex flex-col items-center justify-center text-gray-200 p-6 text-center">
                                    <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                    <span class="text-[10px] uppercase tracking-tighter">Academic Journal</span>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Right: Details -->
                        <div class="md:w-2/3 p-10 md:p-14 flex flex-col justify-center">
                            <div class="flex flex-wrap items-center gap-4 mb-6">
                                <span class="text-[var(--gold)] text-[10px] font-bold uppercase tracking-[0.2em]">{{ $pub->tipe_publikasi ?? 'Scientific Paper' }}</span>
                                <div class="w-1 h-1 rounded-full bg-gray-300"></div>
                                <span class="text-gray-400 text-xs tracking-wide">{{ $pub->tanggal_publikasi }}</span>
                            </div>

                            <h3 class="font-serif text-3xl text-[var(--forest-dark)] mb-6 leading-tight hover:text-[var(--gold)] transition cursor-default">
                                {{ $pub->judul }}
                            </h3>

                            <div class="flex items-center gap-3 mb-8">
                                <div class="w-8 h-[1px] bg-[var(--gold)]"></div>
                                <p class="text-sm text-gray-500">Oleh: <span class="text-[var(--forest)] font-bold italic">{{ $pub->penulis }}</span></p>
                            </div>

                            <div class="flex flex-wrap gap-6">
                                @if($pub->link_view)
                                <a href="{{ $pub->link_view }}" target="_blank" class="group flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-[var(--forest)]">
                                    <span class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center group-hover:bg-[var(--forest)] group-hover:text-white transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </span>
                                    View Repository
                                </a>
                                @endif
                                @if($pub->link_download)
                                <a href="{{ $pub->link_download }}" target="_blank" class="group flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-[var(--forest)]">
                                    <span class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center group-hover:bg-[var(--forest)] group-hover:text-white transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    </span>
                                    Download Full Text
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</div>

<script>
    function switchTab(tabId, btn) {
        // Hide all contents
        document.querySelectorAll('.tab-content').forEach(el => {
            el.classList.remove('active');
        });
        
        // Reset all buttons
        document.querySelectorAll('.tab-btn').forEach(el => {
            el.classList.remove('active-tab', 'text-white');
            el.classList.add('bg-white', 'text-gray-500');
        });

        // Activate target
        const target = document.getElementById(tabId);
        target.classList.add('active');
        btn.classList.add('active-tab');
        btn.classList.remove('bg-white', 'text-gray-500');
    }
</script>
@endsection