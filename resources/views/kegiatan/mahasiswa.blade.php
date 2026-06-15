@extends('layouts.main')
@section('title', 'Kegiatan Kemahasiswaan - Bioteknologi IT Del')

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

/* Hero Pattern */
.bg-dots {
    background-image: radial-gradient(var(--gold) 1px, transparent 1px);
    background-size: 30px 30px;
}

/* Tab Styling */
.tab-btn {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid rgba(26, 74, 56, 0.1);
}

.tab-btn.active-tab {
    background: var(--forest);
    color: var(--gold);
    box-shadow: 0 15px 30px -10px rgba(26, 74, 56, 0.4);
    transform: translateY(-2px);
}

/* Card Styling */
.activity-card {
    background: white;
    border-radius: 2.5rem;
    transition: all 0.5s ease;
    border: 1px solid rgba(0,0,0,0.03);
}

.activity-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 60px -15px rgba(26, 74, 56, 0.1);
}

.img-overlay {
    background: linear-gradient(to top, rgba(12, 36, 28, 0.8), transparent);
}

/* Animations */
.tab-content {
    display: none;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.5s ease-out;
}

.tab-content.active-content {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
.animate-fade { animation: fadeIn 1s ease forwards; }
</style>

<!-- HEADER SECTION -->
<div class="relative w-full bg-gray-50 py-10 md:py-12 overflow-hidden border-b border-gray-100">
    
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?q=80&w=2070&auto=format&fit=crop" 
             alt="Chemistry Background" 
             class="w-full h-full object-cover opacity-10 mix-blend-multiply">
    </div>

    <div class="relative z-10 text-center px-6 container mx-auto">
        
        <h1 class="font-serif text-3xl md:text-4xl text-[#0d2a1f] font-bold tracking-tight mb-4">
            Kegiatan Kemahasiswaan
        </h1>
        
        <div class="w-16 h-[1px] bg-yellow-600/40 mx-auto mt-4"></div>
        
    </div>
</div>

<div class="bg-[var(--soft-bg)] py-16 min-h-screen font-sans">
    <div class="container mx-auto px-6 max-w-6xl">
        
        <!-- TWO-TAB NAVIGATION -->
        <div class="flex justify-center mb-24">
            <div class="bg-white/50 backdrop-blur-md p-2 rounded-full border border-white/50 shadow-sm flex gap-2">
                <button onclick="switchTab('tab-himpunan', this)" class="tab-btn active-tab px-8 md:px-12 py-4 rounded-full font-bold text-[10px] uppercase tracking-widest">
                    Himpunan (HIMABIO)
                </button>
            </div>
        </div>

        <!-- CONTENT: HIMPUNAN -->
        <div id="tab-himpunan" class="tab-content active-content">
            <div class="mb-12 flex flex-col items-center text-center">
                <h2 class="font-serif text-4xl text-[var(--forest-dark)] mb-4">Eksplorasi HIMABIO</h2>
                <p class="text-gray-500 max-w-xl italic">Wadah kolaborasi, pengembangan hardskill, dan perajutan persaudaraan antar mahasiswa Bioteknologi.</p>
            </div>

            @if($himpunan->isEmpty())
                <div class="bg-white rounded-[3rem] p-20 text-center border-dashed border-2 border-gray-200">
                    <p class="text-gray-400 font-serif text-xl italic">Belum ada dokumentasi kegiatan himpunan.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    @foreach($himpunan as $item)
                    <div class="activity-card group overflow-hidden flex flex-col">
                        <div class="relative h-72 overflow-hidden rounded-t-[2.5rem]">
                            @if($item->foto)
                                <img src="{{ asset($item->foto) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="w-full h-full bg-[var(--forest-dark)] flex items-center justify-center text-green-100/20 italic text-xs tracking-widest">No Image Available</div>
                            @endif
                            <div class="absolute inset-0 img-overlay opacity-60"></div>
                            <div class="absolute bottom-6 left-8">
                                <span class="text-[var(--gold)] text-[10px] font-bold uppercase tracking-[0.2em] block mb-2">HIMABIO Event</span>
                                <h3 class="text-white font-serif text-2xl leading-tight">{{ $item->judul }}</h3>
                            </div>
                        </div>
                        <div class="p-10 flex-1">
                            <div class="flex items-center gap-6 mb-6 pb-6 border-b border-gray-50">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[var(--gold)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $item->waktu_pelaksanaan }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[var(--gold)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $item->pelaksana }}</span>
                                </div>
                            </div>
                            <p class="text-gray-600 leading-relaxed text-sm line-clamp-3 italic">{!! $item->deskripsi !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- CONTENT: PKM -->
        <div id="tab-pkm" class="tab-content">
            <div class="mb-12 flex flex-col items-center text-center">
                <h2 class="font-serif text-4xl text-[var(--forest-dark)] mb-4">Pengabdian Masyarakat</h2>
                <p class="text-gray-500 max-w-xl italic">Aksi nyata mahasiswa dalam menyebarkan manfaat ilmu bioteknologi langsung ke lingkungan sekitar.</p>
            </div>

            @if($pkm->isEmpty())
                <div class="bg-white rounded-[3rem] p-20 text-center border-dashed border-2 border-gray-200">
                    <p class="text-gray-400 font-serif text-xl italic">Data pengabdian masyarakat belum tersedia.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    @foreach($pkm as $item)
                    <div class="activity-card group overflow-hidden flex flex-col">
                        <div class="relative h-72 overflow-hidden rounded-t-[2.5rem]">
                            @if($item->foto)
                                <img src="{{ asset($item->foto) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="w-full h-full bg-[var(--forest-dark)] flex items-center justify-center text-green-100/20 italic text-xs tracking-widest">No Image Available</div>
                            @endif
                            <div class="absolute inset-0 img-overlay opacity-60"></div>
                            <div class="absolute bottom-6 left-8">
                                <span class="text-[var(--gold)] text-[10px] font-bold uppercase tracking-[0.2em] block mb-2">Social Impact</span>
                                <h3 class="text-white font-serif text-2xl leading-tight">{{ $item->judul }}</h3>
                            </div>
                        </div>
                        <div class="p-10 flex-1">
                            <div class="flex items-center gap-6 mb-6 pb-6 border-b border-gray-50">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[var(--gold)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $item->waktu_pelaksanaan }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[var(--gold)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $item->pelaksana }}</span>
                                </div>
                            </div>
                            <p class="text-gray-600 leading-relaxed text-sm line-clamp-3 italic">"{{ $item->deskripsi }}"</p>
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
        // Hide all
        document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active-content'));
        
        // Reset all buttons
        document.querySelectorAll('.tab-btn').forEach(el => {
            el.classList.remove('active-tab');
            el.classList.add('bg-white/80', 'text-gray-400');
        });

        // Activate
        const target = document.getElementById(tabId);
        target.classList.add('active-content');
        btn.classList.add('active-tab');
        btn.classList.remove('bg-white/80', 'text-gray-400');
    }
</script>
@endsection