@extends('layouts.main')

@section('title', 'Kisah Sukses & Testimoni - Prodi Bioteknologi IT Del')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Jost:wght@300;400;500;600&display=swap');

:root {
    --forest: #1a4a38;
    --forest-dark: #0c241c;
    --gold: #c6a54a;
    --soft-bg: #eef2f0; 
}

.font-serif { font-family: 'Cormorant Garamond', serif; }
.font-sans { font-family: 'Jost', sans-serif; }

.testimonial-card {
    background: white;
    border-radius: 2rem;
    transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
    border: 1px solid rgba(26, 74, 56, 0.1); 
    box-shadow: 0 10px 30px -10px rgba(0,0,0,0.08); 
    display: flex;
    flex-direction: column;
    /* Menghapus pembatasan tinggi agar kartu memanjang sesuai isi teks */
    height: auto; 
    position: relative;
    overflow: hidden;
}

.testimonial-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px -12px rgba(26, 74, 56, 0.15);
}

.quote-mark {
    font-family: 'Cormorant Garamond', serif;
    font-size: 8rem;
    line-height: 1;
    color: var(--gold);
    opacity: 0.15;
    position: absolute;
    top: -15px;
    right: 20px; /* Saya pindahkan tanda kutip ke kanan atas agar tidak menabrak foto */
    pointer-events: none;
    z-index: 0;
}

.status-badge {
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    padding: 4px 12px;
    border-radius: 6px;
    display: inline-block;
}

/* Custom Pagination Style */
.pagination-wrapper nav {
    display: inline-flex;
    border-radius: 99px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}
</style>

<div class="relative w-full bg-gray-50 py-16 overflow-hidden border-b border-gray-200">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070&auto=format&fit=crop" 
             alt="Student Success Background" 
             class="w-full h-full object-cover opacity-[0.03] mix-blend-multiply">
    </div>

    <div class="relative z-10 text-center px-6 container mx-auto">
        <h1 class="font-serif text-4xl md:text-5xl text-[#0d2a1f] font-bold tracking-tight mb-4">
            Kisah Sukses & Suara Mahasiswa
        </h1>
        <p class="text-gray-600 max-w-2xl mx-auto font-sans font-light leading-relaxed text-base md:text-lg mb-6">
            Inspirasi nyata dari perjalanan akademik mahasiswa dan kontribusi profesional alumni Bioteknologi IT Del di kancah nasional maupun global.
        </p>
        <div class="w-20 h-[2px] bg-[var(--gold)]/50 mx-auto"></div>
    </div>
</div>

<div class="bg-[var(--soft-bg)] py-20 min-h-screen font-sans">
    <div class="container mx-auto px-6 max-w-7xl">
        
        {{-- Saya ubah grid menjadi lebih fleksibel dan tidak memaksakan ketinggian yang sama --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-start">
            @forelse($testimonials as $testimoni)
            <div class="testimonial-card group">
                <span class="quote-mark">“</span>

                <div class="p-8 flex flex-col h-full relative z-10">
                    
                    <div class="flex items-start gap-5 mb-8">
                        {{-- Mengubah foto bulat menjadi kotak potrait elegan --}}
                        <div class="w-20 h-24 rounded-xl flex-shrink-0 shadow-md border border-gray-100 overflow-hidden bg-gray-50 relative">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent z-10"></div>
                            @if($testimoni->photo)
                                <img src="{{ asset($testimoni->photo) }}" alt="{{ strip_tags($testimoni->name) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </div>
                            @endif
                        </div>

                        <div class="pt-1">
                            <h4 class="text-[var(--forest-dark)] font-bold text-lg leading-tight mb-2">{!! $testimoni->name !!}</h4>
                            
                            @if($testimoni->graduation_year)
                                <span class="status-badge bg-amber-50 text-[var(--gold)] border border-amber-100 mb-2">Angkatan {!! $testimoni->graduation_year !!}</span>
                            @else
                                <span class="status-badge bg-emerald-50 text-[var(--forest)] border border-emerald-100 mb-2">Mahasiswa Aktif</span>
                            @endif

                            @if($testimoni->workplace)
                                <p class="text-xs text-gray-500 font-medium leading-snug">
                                    <span class="text-[var(--forest)] font-bold block mb-0.5">{!! $testimoni->position ?? 'Contributor' !!}</span> 
                                    di {!! $testimoni->workplace !!}
                                </p>
                            @endif
                        </div>
                    </div>

                    {{-- class break-words ditambahkan agar teks panjang tersusun rapi --}}
                    <div class="relative z-10 border-t border-gray-100 pt-6 mt-auto">
                        <div class="font-serif text-xl font-medium leading-relaxed text-gray-700 break-words text-justify">
                            {!! $testimoni->testimony !!}
                        </div>
                    </div>

                </div>
            </div>
            @empty
            <div class="col-span-full py-24 text-center">
                <div class="inline-block p-16 bg-white rounded-[3rem] shadow-sm border-dashed border-2 border-gray-300">
                    <p class="text-gray-500 font-serif text-2xl italic">Belum ada cerita yang dibagikan saat ini.</p>
                </div>
            </div>
            @endforelse
        </div>

        <div class="mt-20 flex justify-center pagination-wrapper">
            <div class="bg-white px-6 py-2 rounded-full shadow-sm border border-gray-200">
                {!! $testimonials->links() !!}
            </div>
        </div>

        <div class="mt-20 text-center opacity-40">
            <div class="flex justify-center gap-3">
                <div class="w-1.5 h-1.5 rounded-full bg-[var(--gold)]"></div>
                <div class="w-1.5 h-1.5 rounded-full bg-[var(--gold)]"></div>
                <div class="w-1.5 h-1.5 rounded-full bg-[var(--gold)]"></div>
            </div>
        </div>
    </div>
</div>
@endsection