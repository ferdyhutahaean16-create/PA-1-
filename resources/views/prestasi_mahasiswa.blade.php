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
            <button onclick="switchTab('tab-publikasi', this)" class="tab-btn bg-white text-gray-500 px-8 py-3 rounded-full font-bold text-xs uppercase tracking-widest border border-gray-200">
                Publikasi Mahasiswa
            </button>
        </div>

        <!-- TAB PRESTASI -->
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
                    <div class="glass-card hover-gold transition-all duration-300 flex flex-col overflow-hidden group">
                        
                        {{-- 1. BAGIAN FOTO UTAMA (DI ATAS) --}}
                        <div class="relative w-full h-56 bg-gray-100 overflow-hidden">
                            @if($item->certificate_file)
                                {{-- Efek group-hover:scale-105 akan membuat foto sedikit membesar saat kartu disentuh --}}
                                <img src="{{ asset($item->certificate_file) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-in-out">
                            @else
                                <div class="w-full h-full bg-[var(--forest)] flex items-center justify-center text-[var(--gold)] font-serif text-6xl uppercase opacity-90">
                                    {{ substr($item->achiever_name, 0, 1) }}
                                </div>
                            @endif

                            {{-- Label Tingkat Lomba (Mengambang di kiri atas foto) --}}
                            <div class="absolute top-4 left-4 z-10">
                                <span class="bg-[var(--forest)]/95 backdrop-blur-sm text-[var(--gold)] text-[10px] font-bold px-4 py-1.5 rounded-full uppercase tracking-widest shadow-lg border border-[var(--gold)]/30">
                                    {{ $item->level ?? 'Nasional' }}
                                </span>
                            </div>
                            
                            {{-- Label Tahun (Mengambang di kanan atas foto) --}}
                            <div class="absolute top-4 right-4 z-10">
                                <span class="bg-white/95 backdrop-blur-sm text-[var(--forest-dark)] font-serif text-lg px-3 py-1 rounded-xl shadow-lg font-bold border border-gray-100">
                                    {{ \Carbon\Carbon::parse($item->date_earned)->format('Y') }}
                                </span>
                            </div>
                        </div>

                        {{-- 2. BAGIAN KONTEN TEKS (DI BAWAH FOTO) --}}
                        <div class="p-6 md:p-8 flex flex-col flex-1 bg-white/40">
                            <h3 class="font-serif text-2xl text-[var(--forest-dark)] mb-2 leading-snug line-clamp-2">
                                {{ $item->achievement_name }}
                            </h3>

                            @if($item->organizer)
                                <p class="text-[10px] uppercase tracking-widest font-bold text-gray-500 mb-4">
                                    Penyelenggara: <span class="text-[var(--forest)]">{{ $item->organizer }}</span>
                                </p>
                            @endif

                            @if($item->description)
                                <p class="text-gray-600 text-sm leading-relaxed mb-6 flex-1 italic line-clamp-3">
                                    {!! $item->description !!}
                                </p>
                            @else
                                <div class="mb-6 flex-1"></div>
                            @endif
                            
                            {{-- Footer Kartu (Nama Peraih Prestasi) --}}
                            <div class="pt-5 border-t border-gray-200/60 mt-auto flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-[var(--forest)] flex items-center justify-center text-[var(--gold)] font-bold text-sm uppercase shadow-sm">
                                    {{ substr($item->achiever_name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-[var(--forest-dark)]">{{ $item->achiever_name }}</p>
                                    <p class="text-[10px] uppercase text-[var(--gold)] font-bold tracking-widest">Student</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- TAB PUBLIKASI -->
        <div id="tab-publikasi" class="tab-content">
            <div class="mb-12 flex items-center gap-4">
                <div class="h-[1px] flex-1 bg-gray-200"></div>
                <h2 class="font-serif text-3xl text-[var(--forest-dark)]">Publikasi Riset Mahasiswa</h2>
                <div class="h-[1px] flex-1 bg-gray-200"></div>
            </div>

            @if(isset($publikasi) && $publikasi->isEmpty())
                <div class="glass-card p-16 text-center italic text-gray-400">Belum ada data publikasi mahasiswa.</div>
            @elseif(isset($publikasi))
                <div class="space-y-8">
                    @foreach($publikasi as $pub)
                    <div class="glass-card overflow-hidden flex flex-col md:flex-row hover:shadow-xl transition-all">
                        <div class="md:w-1/4 bg-white/50 p-8 flex items-center justify-center border-b md:border-b-0 md:border-r border-gray-100">
                            @if($pub->image)
                                <img src="{{ asset('storage/' . $pub->image) }}" class="max-h-40 rounded shadow-md transform -rotate-2">
                            @else
                                <div class="w-32 h-40 bg-gray-100 rounded flex items-center justify-center text-gray-300">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                </div>
                            @endif
                        </div>
                        <div class="md:w-3/4 p-10 flex flex-col justify-center">
                            <div class="flex flex-wrap items-center gap-3 mb-4">
                                <span class="text-[var(--gold)] text-[10px] font-bold uppercase tracking-widest">{{ $pub->publication_type ?? 'International Journal' }}</span>
                                <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
                                <span class="text-gray-400 text-xs">{{ \Carbon\Carbon::parse($pub->publication_date)->format('d M Y') }}</span>
                            </div>
                            
                            <h3 class="font-serif text-2xl text-[var(--forest-dark)] mb-4 leading-snug">{{ $pub->title }}</h3>
                            
                            <p class="text-gray-500 text-sm mb-6">Penulis: <span class="text-[var(--forest)] font-bold italic">{{ $pub->author }}</span></p>
                            
                            <div class="flex gap-4">
                                @if($pub->journal_link)
                                <a href="{{ $pub->journal_link }}" target="_blank" class="text-[10px] font-bold uppercase text-[var(--forest)] flex items-center gap-2 hover:text-[var(--gold)] transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    View Full Paper
                                </a>
                                @endif
                                
                                @if($pub->pdf_file)
                                <a href="{{ asset('storage/' . $pub->pdf_file) }}" target="_blank" class="text-[10px] font-bold uppercase text-[var(--forest)] flex items-center gap-2 hover:text-[var(--gold)] transition">
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

    </div>
</div>

<script>
    function switchTab(tabId, btn) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
        
        document.querySelectorAll('.tab-btn').forEach(el => {
            el.classList.remove('active-tab', 'text-white', 'border-transparent');
            el.classList.add('bg-white', 'text-gray-500', 'border-gray-200');
        });

        const target = document.getElementById(tabId);
        target.classList.add('active');
        btn.classList.add('active-tab', 'text-white', 'border-transparent');
        btn.classList.remove('bg-white', 'text-gray-500', 'border-gray-200');
    }
</script>
@endsection