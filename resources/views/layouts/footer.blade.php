<style>
    :root {
        --forest: #1a4a38;
        --forest-dark: #0c241c;
        --gold: #c6a54a;
    }

    .footer-premium {
        background: linear-gradient(to bottom, var(--forest), var(--forest-dark));
        position: relative;
        overflow: hidden;
    }

    /* Tekstur halus pada background */
    .footer-texture {
        position: absolute;
        inset: 0;
        opacity: 0.05;
        background-image: url('https://www.transparenttextures.com/patterns/microbes.png');
        pointer-events: none;
    }

    .footer-link {
        transition: all 0.3s ease;
        display: inline-block;
    }

    .footer-link:hover {
        color: var(--gold);
        transform: translateX(5px);
    }

    .font-serif { font-family: 'Cormorant Garamond', serif; }
    .font-sans { font-family: 'Jost', sans-serif; }
</style>

<footer class="footer-premium text-white pt-20 pb-10 mt-auto font-sans">
    <div class="footer-texture"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 text-sm">
            
            {{-- KOLOM 1: IDENTITAS --}}
            <div class="md:col-span-5">
                <div class="flex items-center gap-4 mb-8">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/98/Logo_IT_Del.png" 
                         class="h-16 brightness-0 invert" alt="Logo IT Del">
                    <div class="h-12 w-[1px] bg-white/20 hidden md:block"></div>
                    <div>
                        <h3 class="font-serif text-2xl font-bold text-[var(--gold)] leading-tight">Prodi Bioteknologi</h3>
                        <p class="text-[10px] text-green-100/60 uppercase tracking-[0.3em] font-bold">Institut Teknologi Del</p>
                    </div>
                </div>
                <p class="text-green-100/70 leading-relaxed max-w-md text-justify italic mb-8">
                    "Menghasilkan lulusan yang unggul dalam bidang bioteknologi, beriman, dan berbudi pekerti luhur untuk memajukan peradaban bangsa melalui inovasi hayati."
                </p>
                {{-- Sosial Media (Opsional) --}}
                <div class="flex gap-4">
                    <div class="w-8 h-8 rounded-full border border-white/20 flex items-center justify-center hover:bg-[var(--gold)] hover:border-[var(--gold)] transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.774 4.919 4.851.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.075-1.664 4.703-4.919 4.851-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.775-4.919-4.851-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.075 1.664-4.704 4.919-4.851 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </div>
                </div>
            </div>

            {{-- KOLOM 2: TAUTAN --}}
            <div class="md:col-span-3">
                <h3 class="font-serif text-xl font-bold mb-8 text-[var(--gold)] border-b border-white/10 pb-2 inline-block">Eksplorasi</h3>
                <ul class="space-y-4 text-green-100/80">
                    <li><a href="#" class="footer-link">Kurikulum Akademik</a></li>
                    <li><a href="#" class="footer-link">Fasilitas Laboratorium</a></li>
                    <li><a href="#" class="footer-link">Penelitian & Riset</a></li>
                    <li><a href="#" class="footer-link">Kemahasiswaan</a></li>
                </ul>
            </div>

            {{-- KOLOM 3: KONTAK --}}
            <div class="md:col-span-4">
                <h3 class="font-serif text-xl font-bold mb-8 text-[var(--gold)] border-b border-white/10 pb-2 inline-block">Hubungi Kami</h3>
                <div class="space-y-6 text-green-100/80">
                    <div class="flex items-start gap-4">
                        <svg class="w-5 h-5 text-[var(--gold)] shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <p class="leading-relaxed">Jl. Sisingamangaraja, Sitoluama, Laguboti, Toba, Sumatera Utara, 22381</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5 text-[var(--gold)] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <p>+62 632 331234</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5 text-[var(--gold)] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <p>biotek@del.ac.id</p>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- COPYRIGHT --}}
        <div class="mt-20 pt-8 border-t border-white/10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-[10px] text-green-200/40 uppercase tracking-[0.2em]">
                    &copy; {{ date('Y') }} Program Studi Bioteknologi Institut Teknologi Del. 
                </p>
                <p class="text-[10px] text-green-200/40 uppercase tracking-[0.2em]">
                    Developed by <span class="text-[var(--gold)]/60">Wesly Simatupang</span>
                </p>
            </div>
        </div>
    </div>
</footer>