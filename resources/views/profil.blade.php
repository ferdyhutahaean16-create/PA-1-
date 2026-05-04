@extends('layouts.main')
@section('title', 'Profil Program Studi - Bioteknologi')

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
    background: radial-gradient(circle at 20% 20%, #e6f0ec 0%, transparent 40%),
                radial-gradient(circle at 80% 30%, #fdf6e3 0%, transparent 40%),
                var(--soft-bg);
}

/* Glassmorphism Core */
.glass {
    background: rgba(255, 255, 255, 0.75);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.5);
}

.sidebar-glass {
    background: rgba(255, 255, 255, 0.4);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.7);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
}

/* Sidebar Nav Styling */
.tab-btn {
    display: flex;
    align-items: center;
    gap: 12px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    color: #4b5563;
}

.tab-btn:hover:not(.active) {
    padding-left: 1.75rem;
    color: var(--forest);
    background: rgba(255, 255, 255, 0.5);
}

.tab-btn.active {
    background: var(--forest);
    color: white;
    box-shadow: 0 10px 20px -5px rgba(26, 74, 56, 0.3);
    transform: translateX(8px);
}

.icon-box {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    transition: all 0.3s ease;
    background: rgba(26, 74, 56, 0.05);
    color: var(--forest);
}

.tab-btn.active .icon-box {
    background: rgba(255, 255, 255, 0.2);
    color: var(--gold);
}

.dot-indicator {
    position: absolute;
    right: 15px;
    width: 6px;
    height: 6px;
    background: var(--gold);
    border-radius: 50%;
    opacity: 0;
    transition: 0.3s;
}

.tab-btn.active .dot-indicator {
    opacity: 1;
}

/* Content Transitions */
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

.prose-custom {
    line-height: 1.8;
    color: #374151;
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
.animate-fade-in { animation: fadeIn 0.8s ease forwards; }
</style>

<!-- BACKGROUND DECOR -->
<div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
    <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-[var(--forest-light)] opacity-10 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-[-10%] right-[-5%] w-[400px] h-[400px] bg-[var(--gold)] opacity-15 rounded-full blur-[120px]"></div>
</div>

<!-- HEADER SECTION -->
<div class="relative w-full bg-[var(--forest-dark)] overflow-hidden">
    <div class="absolute inset-0 opacity-20" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>
    <div class="relative z-10 py-28 text-center px-6">
        <span class="inline-block text-[var(--gold)] tracking-[0.5em] uppercase text-[10px] font-bold mb-4 animate-fade-in">Academic Information</span>
        <h1 class="font-serif text-5xl md:text-6xl text-white font-light tracking-tight">
            Profil Program Studi
        </h1>
        <div class="w-24 h-[1px] bg-[var(--gold)] mx-auto mt-8 opacity-60"></div>
    </div>
</div>

<!-- MAIN CONTAINER -->
<div class="container mx-auto px-6 py-12 max-w-6xl -mt-12 relative z-10">
    <div class="flex flex-col lg:flex-row gap-8">

        <!-- SIDEBAR NAVIGATION -->
        <div class="lg:w-3/12">
            <div class="sidebar-glass rounded-[2rem] p-4 sticky top-24">
                <div class="mb-6 px-4 pt-2">
                    <h4 class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">Navigasi Utama</h4>
                </div>
                
                <nav class="space-y-3">
                    <button onclick="switchTab('visi', this)" class="tab-btn active w-full px-4 py-4 rounded-2xl text-sm font-semibold group">
                        <div class="icon-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                        </div>
                        <span>Visi & Misi</span>
                        <div class="dot-indicator"></div>
                    </button>

                    <button onclick="switchTab('sejarah', this)" class="tab-btn w-full px-4 py-4 rounded-2xl text-sm font-semibold group">
                        <div class="icon-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 8v4l3 3"/><circle cx="12" cy="12" r="10"/></svg>
                        </div>
                        <span>Sejarah</span>
                        <div class="dot-indicator"></div>
                    </button>

                    <button onclick="switchTab('prospek', this)" class="tab-btn w-full px-4 py-4 rounded-2xl text-sm font-semibold group">
                        <div class="icon-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                        </div>
                        <span>Prospek Karir</span>
                        <div class="dot-indicator"></div>
                    </button>
                </nav>

                <!-- Help Card -->
                <div class="mt-8 p-5 bg-gradient-to-br from-[var(--forest)] to-[var(--forest-dark)] rounded-[1.5rem] text-white relative overflow-hidden group">
                    <div class="relative z-10">
                        <p class="text-[10px] text-[var(--gold)] font-bold uppercase mb-1">Butuh Bantuan?</p>
                        <p class="text-[11px] opacity-80 leading-relaxed">Hubungi admin prodi untuk informasi akademik lebih lanjut.</p>
                    </div>
                    <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-white/10 rounded-full blur-xl group-hover:scale-150 transition-transform duration-700"></div>
                </div>
            </div>
        </div>

        <!-- CONTENT AREA -->
        <div class="lg:w-9/12">
            @if($profil)
                <!-- Tab: Visi Misi -->
                <article id="content-visi" class="tab-content active glass rounded-[2.5rem] p-8 md:p-14 shadow-sm border-white/80">
                    <div class="mb-12">
                        <h2 class="font-serif text-4xl text-[var(--forest-dark)] mb-8">Visi & Misi</h2>
                        <div class="relative pl-8 border-l-2 border-[var(--gold)]/30">
                            <h3 class="text-[var(--gold)] uppercase tracking-widest text-[10px] font-bold mb-4">Visi Masa Depan</h3>
                            <p class="font-serif text-2xl md:text-3xl italic leading-snug text-gray-800">
                                "{{ $profil->visi }}"
                            </p>
                        </div>
                    </div>
                    
                    <div class="prose-custom">
                        <h3 class="text-[var(--gold)] uppercase tracking-widest text-[10px] font-bold mb-6">Misi Strategis</h3>
                        <div class="space-y-4 text-gray-700 text-lg">
                            {!! nl2br(e($profil->misi)) !!}
                        </div>
                    </div>
                </article>

                <!-- Tab: Sejarah -->
                <article id="content-sejarah" class="tab-content glass rounded-[2.5rem] p-8 md:p-14 shadow-sm border-white/80">
                    <h2 class="font-serif text-4xl text-[var(--forest-dark)] mb-8 border-b border-gray-100 pb-6">Sejarah Singkat</h2>
                    <div class="prose-custom text-justify first-letter:text-5xl first-letter:font-serif first-letter:text-[var(--forest)] first-letter:mr-3 first-letter:float-left">
                        {!! nl2br(e($profil->sejarah)) !!}
                    </div>
                </article>

                <!-- Tab: Prospek -->
                <article id="content-prospek" class="tab-content glass rounded-[2.5rem] p-8 md:p-14 shadow-sm border-white/80">
                    <h2 class="font-serif text-4xl text-[var(--forest-dark)] mb-8 border-b border-gray-100 pb-6">Prospek Karir</h2>
                    <div class="grid grid-cols-1 md:gap-8 prose-custom">
                        <div class="bg-white/40 p-6 rounded-2xl border border-white/60">
                            {!! nl2br(e($profil->prospek_karir)) !!}
                        </div>
                    </div>
                </article>
            @else
                <div class="glass rounded-[2.5rem] p-24 text-center border-dashed border-2 border-gray-300">
                    <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                    </div>
                    <p class="text-gray-500 font-medium italic">Informasi profil belum tersedia dalam basis data.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
function switchTab(tabId, element) {
    // 1. Reset all buttons
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
    });

    // 2. Activate clicked button
    element.classList.add('active');

    // 3. Hide all content with a quick fade-out
    document.querySelectorAll('.tab-content').forEach(content => {
        content.style.opacity = '0';
        content.classList.remove('active');
    });

    // 4. Show target content with animation
    const target = document.getElementById('content-' + tabId);
    if(target) {
        setTimeout(() => {
            target.classList.add('active');
        }, 50);
    }
}
</script>

@endsection