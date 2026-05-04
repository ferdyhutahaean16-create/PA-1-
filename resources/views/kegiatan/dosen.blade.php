@extends('layouts.main')

@section('title', 'Pengabdian Masyarakat (PKM) - Bioteknologi IT Del')

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

/* Hero Section Texture */
.bg-pattern {
    background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23c6a54a" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
}

/* Impact Card Styling */
.impact-card {
    background: white;
    border-radius: 2.5rem;
    transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
    border: 1px solid rgba(0,0,0,0.03);
}

.impact-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 30px 60px -15px rgba(26, 74, 56, 0.15);
}

.img-container {
    mask-image: radial-gradient(white, black); /* Fix for overflow rounded corners in some browsers */
}

.img-zoom {
    transition: transform 1.2s scale;
}

.impact-card:hover .img-zoom {
    transform: scale(1.1);
}

.date-badge {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(8px);
    border: 1px solid var(--gold);
}

/* Typography Accent */
.line-accent {
    width: 60px;
    height: 2px;
    background: linear-gradient(to right, var(--gold), transparent);
}

.fade-in {
    animation: fadeInUp 0.8s ease-out forwards;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<!-- HEADER / HERO SECTION -->
<div class="relative w-full bg-[var(--forest-dark)] overflow-hidden">
    <div class="absolute inset-0 bg-pattern opacity-20"></div>
    <div class="relative z-10 py-28 text-center px-6">
        <span class="inline-block text-[var(--gold)] tracking-[0.5em] uppercase text-[10px] font-bold mb-4">Community Engagement</span>
        <h1 class="font-serif text-5xl md:text-6xl text-white font-light tracking-tight mb-6">
            Pengabdian Masyarakat
        </h1>
        <p class="text-green-100/70 max-w-2xl mx-auto font-sans font-light leading-relaxed text-lg">
            Mewujudkan sains yang bermanfaat melalui penerapan inovasi bioteknologi untuk kesejahteraan dan kemajuan masyarakat.
        </p>
        <div class="w-24 h-[1px] bg-[var(--gold)] mx-auto mt-10 opacity-60"></div>
    </div>
</div>

<div class="bg-[var(--soft-bg)] py-20 min-h-screen font-sans">
    <div class="container mx-auto px-6 max-w-7xl">
        
        <!-- SECTION TITLE -->
        <div class="mb-16 flex items-end justify-between border-b border-gray-200 pb-8">
            <div class="fade-in">
                <h2 class="font-serif text-4xl text-[var(--forest-dark)]">Daftar Inisiatif & Kegiatan</h2>
                <div class="line-accent mt-4"></div>
            </div>
            <div class="hidden md:block">
                <p class="text-sm text-gray-400 font-medium italic">Menampilkan kontribusi dosen bioteknologi terbaru.</p>
            </div>
        </div>

        @if($kegiatan->isEmpty())
            <div class="bg-white rounded-[3rem] p-24 text-center shadow-sm border border-gray-100 fade-in">
                <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="font-serif text-3xl text-gray-400">Arsip sedang disusun</h3>
                <p class="text-gray-400 mt-2">Data kegiatan pengabdian akan segera ditampilkan kembali.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach($kegiatan as $item)
                <div class="impact-card group fade-in" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    
                    <!-- Documentation Image -->
                    <div class="relative h-64 overflow-hidden rounded-t-[2.5rem] bg-gray-200 img-container">
                        @if($item->foto)
                            <img src="{{ asset($item->foto) }}" alt="{{ $item->judul }}" 
                                 class="w-full h-full object-cover img-zoom">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-[var(--forest-dark)] text-green-100/30">
                                <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span class="text-[10px] uppercase tracking-widest">Documentation Pending</span>
                            </div>
                        @endif
                        
                        <!-- Floating Date Badge -->
                        <div class="absolute bottom-4 left-4 date-badge px-4 py-2 rounded-2xl shadow-lg">
                            <span class="text-[10px] text-[var(--forest)] font-bold uppercase tracking-widest">
                                {{ $item->waktu_pelaksanaan }}
                            </span>
                        </div>
                    </div>

                    <!-- Card Content -->
                    <div class="p-8 md:p-10 flex flex-col flex-1">
                        <h3 class="font-serif text-2xl text-[var(--forest-dark)] mb-6 leading-tight group-hover:text-[var(--gold)] transition-colors duration-300">
                            {{ $item->judul }}
                        </h3>
                        
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center gap-4">
                                <div class="w-8 h-8 rounded-full bg-[var(--soft-bg)] flex items-center justify-center text-[var(--gold)]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[9px] uppercase tracking-widest text-gray-400 font-bold">Ketua Pelaksana</p>
                                    <p class="text-sm font-semibold text-gray-700">{{ $item->pelaksana }}</p>
                                </div>
                            </div>

                            @if($item->tempat)
                            <div class="flex items-center gap-4">
                                <div class="w-8 h-8 rounded-full bg-[var(--soft-bg)] flex items-center justify-center text-[var(--gold)]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[9px] uppercase tracking-widest text-gray-400 font-bold">Lokasi Kegiatan</p>
                                    <p class="text-sm font-semibold text-gray-700">{{ $item->tempat }}</p>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="pt-6 border-t border-gray-100 mt-auto">
                            <p class="text-gray-500 text-sm leading-relaxed line-clamp-3 italic">
                                "{{ $item->deskripsi ?? 'Kegiatan ini merupakan bagian dari komitmen Program Studi dalam hilirisasi riset bioteknologi kepada masyarakat.' }}"
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif

        <!-- FOOTER DECORATION -->
       <!-- FOOTER DECORATION REPLACED -->
        <div class="mt-32 text-center fade-in">
            <!-- Garis Dekoratif -->
            <div class="inline-block p-[1px] bg-gradient-to-r from-transparent via-[var(--gold)] to-transparent w-full max-w-lg mb-12"></div>
            
            <h4 class="font-serif text-3xl md:text-4xl text-[var(--forest-dark)] mb-6">Dedikasi Untuk Negeri</h4>
            
            <div class="max-w-2xl mx-auto mb-12">
                <p class="text-gray-500 font-serif text-xl italic leading-relaxed">
                    "Sains bukan sekadar deretan angka di dalam laboratorium, melainkan jawaban nyata atas tantangan yang dihadapi oleh masyarakat."
                </p>
            </div>

            <!-- Navigation Links (Pengganti Tombol Admin) -->
            <div class="flex flex-col sm:flex-row justify-center items-center gap-6">
                <a href="{{ url('/profil') }}" class="group flex items-center gap-3 px-10 py-4 bg-white border border-gray-200 text-[var(--forest)] rounded-full font-bold text-[10px] uppercase tracking-[0.2em] hover:border-[var(--gold)] hover:text-[var(--gold)] transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                    Kembali ke Profil
                </a>
                
                <a href="{{ url('/kurikulum') }}" class="group flex items-center gap-3 px-10 py-4 bg-[var(--forest)] text-[var(--gold)] rounded-full font-bold text-[10px] uppercase tracking-[0.2em] hover:bg-[var(--forest-dark)] transition-all shadow-xl hover:-translate-y-1 duration-300">
                    Eksplor Kurikulum
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </a>
            </div>

            <!-- Little Ornament -->
            <div class="mt-20 opacity-20 flex justify-center gap-4">
                <div class="w-1.5 h-1.5 rounded-full bg-[var(--gold)]"></div>
                <div class="w-1.5 h-1.5 rounded-full bg-[var(--gold)]"></div>
                <div class="w-1.5 h-1.5 rounded-full bg-[var(--gold)]"></div>
            </div>
        </div>
    </div>
</div>
@endsection