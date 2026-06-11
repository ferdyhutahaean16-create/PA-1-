@extends('layouts.main')

@section('title', 'Kisah Sukses & Testimoni - Prodi Bioteknologi IT Del')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Jost:wght@300;400;500;600&display=swap');

:root {
    --forest: #1a4a38;
    --forest-dark: #0c241c;
    --gold: #c6a54a;
    /* Aku gelapkan SEDIKIT SAJA background luar kartunya biar kartu putihnya "muncul" */
    --soft-bg: #eef2f0; 
}

.font-serif { font-family: 'Cormorant Garamond', serif; }
.font-sans { font-family: 'Jost', sans-serif; }

/* Hero Texture */
.bg-pattern {
    background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23c6a54a" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
}

/* Card Editorial Style */
.testimonial-card {
    background: white;
    border-radius: 2.5rem;
    transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
    /* Tambah shadow & border tipis biar kartunya punya bentuk walau isinya dikit */
    border: 1px solid rgba(26, 74, 56, 0.1); 
    box-shadow: 0 10px 30px -10px rgba(0,0,0,0.08); 
    display: flex;
    flex-direction: column;
    height: 100%;
}

.testimonial-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 30px 60px -12px rgba(26, 74, 56, 0.15);
}

.quote-mark {
    font-family: 'Cormorant Garamond', serif;
    font-size: 8rem;
    line-height: 1;
    color: var(--gold);
    opacity: 0.15;
    position: absolute;
    top: -20px;
    left: 20px;
    pointer-events: none;
}

.profile-border {
    position: relative;
    padding: 3px;
    background: linear-gradient(135deg, var(--forest), var(--gold));
}

.status-badge {
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    padding: 4px 12px;
    border-radius: 99px;
}

/* Custom Pagination Style */
.pagination-wrapper nav {
    display: inline-flex;
    border-radius: 99px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}
</style>

<!-- HEADER / HERO -->
<div class="relative w-full bg-gray-50 py-10 overflow-hidden border-b border-gray-200">
    
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=2070&auto=format&fit=crop" 
             alt="Student Success Background" 
             class="w-full h-full object-cover opacity-10 mix-blend-multiply">
    </div>

    <div class="relative z-10 text-center px-6 container mx-auto">
        
        <span class="inline-block text-yellow-600 tracking-[0.4em] uppercase text-[9px] md:text-[10px] font-bold mb-3">
            Voices of Excellence
        </span>
        
        <h1 class="font-serif text-3xl md:text-4xl text-[#0d2a1f] font-bold tracking-tight mb-3">
            Kisah Sukses & Suara Mahasiswa
        </h1>
        
        <p class="text-gray-600 max-w-2xl mx-auto font-sans font-light leading-relaxed text-sm md:text-base mb-5">
            Inspirasi nyata dari perjalanan akademik mahasiswa dan kontribusi profesional alumni Bioteknologi IT Del di kancah nasional maupun global.
        </p>
        
        <div class="w-16 h-[1px] bg-yellow-600/40 mx-auto"></div>
        
    </div>
</div>

<div class="bg-[var(--soft-bg)] py-20 min-h-screen font-sans">
    <div class="container mx-auto px-6 max-w-7xl">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @forelse($testimonials as $testimoni)
            <div class="testimonial-card p-10 flex flex-col relative group overflow-hidden">
                
                <!-- Floating Quote Icon -->
                <span class="quote-mark">“</span>

                <!-- Testimony Text -->
                <!-- Aku tambahkan mt-6, flex-grow, dan ubah teks ke font-medium (biar lebih tebal) dan posisinya di tengah -->
                <div class="relative z-10 flex-grow mb-10 mt-6 flex flex-col justify-center">
                    <p class="font-serif text-2xl font-medium leading-relaxed text-[var(--forest-dark)] text-center">
                        {!! $testimoni->testimony !!}
                    </p>
                </div>

                <!-- Profile Section -->
                <!-- Tambah mt-auto biar bagian profil selalu terdorong ke bawah mentok -->
                <div class="relative z-10 flex items-center gap-5 pt-8 border-t border-gray-200 mt-auto">
                    <div class="profile-border rounded-full flex-shrink-0 shadow-lg">
                        <div class="w-16 h-16 rounded-full bg-white overflow-hidden">
                            @if($testimoni->photo)
                                <img src="{{ asset($testimoni->photo) }}" alt="{{ $testimoni->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400">
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <h4 class="text-[var(--forest-dark)] font-bold text-lg leading-tight mb-1">{!! $testimoni->name !!}</h4>
                        
                        <!-- Dynamic Status Badge -->
                        @if($testimoni->graduation_year)
                            <span class="status-badge bg-amber-50 text-[var(--gold)] border border-amber-100">Angkatan {!! $testimoni->graduation_year !!}</span>
                        @else
                            <span class="status-badge bg-emerald-50 text-[var(--forest)] border border-emerald-100">Mahasiswa Aktif</span>
                        @endif

                        @if($testimoni->workplace)
                            <p class="text-[11px] text-gray-500 font-medium mt-2 leading-snug">
                                <span class="text-[var(--forest)] font-bold">{!! $testimoni->position ?? 'Contributor' !!}</span> @ {!! $testimoni->workplace !!}
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Decoration background effect on hover -->
                <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-[var(--gold)] opacity-0 group-hover:opacity-5 rounded-full transition-opacity duration-700"></div>
            </div>
            @empty
            <div class="col-span-full py-24 text-center">
                <div class="inline-block p-16 bg-white rounded-[3rem] shadow-sm border-dashed border-2 border-gray-300">
                    <p class="text-gray-500 font-serif text-2xl italic">Belum ada cerita yang dibagikan saat ini.</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- STYLED PAGINATION -->
        <div class="mt-20 flex justify-center pagination-wrapper">
            <div class="bg-white px-6 py-2 rounded-full shadow-sm border border-gray-200">
                {!! $testimonials->links() !!}
            </div>
        </div>

        <!-- BOTTOM DECORATION -->
        <div class="mt-32 text-center opacity-40">
            <div class="flex justify-center gap-3">
                <div class="w-1.5 h-1.5 rounded-full bg-[var(--gold)]"></div>
                <div class="w-1.5 h-1.5 rounded-full bg-[var(--gold)]"></div>
                <div class="w-1.5 h-1.5 rounded-full bg-[var(--gold)]"></div>
            </div>
        </div>
    </div>
</div>
@endsection