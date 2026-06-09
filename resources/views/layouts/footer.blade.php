<style>
    :root {
        /* 💡 Warna hijau dibuat lebih cerah dan segar */
        --forest-light: #205c42; 
        --forest: #144530;
        --gold: #dce05c; /* Warna emas dibuat sedikit lebih terang menyala */
    }

    .footer-premium {
        /* Menggunakan gradien menyamping agar terlihat lebih modern */
        background: linear-gradient(135deg, var(--forest-light), var(--forest));
        position: relative;
        overflow: hidden;
    }

    .footer-texture {
        position: absolute;
        inset: 0;
        opacity: 0.04;
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

<footer class="footer-premium text-white pt-12 pb-6 mt-auto font-sans">
    <div class="footer-texture"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10">
            
            {{-- KOLOM 1: IDENTITAS --}}
            <div class="md:col-span-5">
                <div class="flex items-center gap-4 mb-6">
                    <img src="{{ asset('Adminlte/dist/img/logo_DEL.png') }}" 
                         class="h-16" alt="Logo IT Del">

                    <div class="h-12 w-[1px] bg-white/30 hidden md:block"></div>
                    <div>
                        <h3 class="font-serif text-2xl font-bold text-[var(--gold)] leading-tight">Prodi Bioteknologi</h3>
                        <p class="text-xs text-white/90 uppercase tracking-[0.2em] font-bold mt-1">Institut Teknologi Del</p>
                    </div>
                </div>
                <p class="text-white/90 leading-relaxed max-w-md text-justify italic mb-6 text-base">
                    "Menghasilkan lulusan yang unggul dalam bidang bioteknologi, beriman, dan berbudi pekerti luhur untuk memajukan peradaban bangsa melalui inovasi hayati."
                </p>
                
                {{-- Sosial Media --}}
                <div class="flex gap-4">
                    {{-- Instagram --}}
                    <a href="https://www.instagram.com/it.del/" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full border border-white/30 flex items-center justify-center hover:bg-[var(--gold)] hover:border-[var(--gold)] hover:text-[#144530] transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.774 4.919 4.851.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.075-1.664 4.703-4.919 4.851-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.775-4.919-4.851-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.075 1.664-4.704 4.919-4.851 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    {{-- Facebook --}}
                    <a href="https://www.facebook.com/InstitutTeknologiDel/" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full border border-white/30 flex items-center justify-center hover:bg-[var(--gold)] hover:border-[var(--gold)] hover:text-[#144530] transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"/></svg>
                    </a>
                    {{-- TikTok --}}
                    <a href="https://www.tiktok.com/@institutteknologidel" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full border border-white/30 flex items-center justify-center hover:bg-[var(--gold)] hover:border-[var(--gold)] hover:text-[#144530] transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                    </a>
                </div>
            </div>

            {{-- KOLOM 2: TAUTAN --}}
            <div class="md:col-span-3">
                <h3 class="font-serif text-[22px] font-bold mb-6 text-[var(--gold)] border-b border-white/20 pb-2 inline-block">Eksplorasi</h3>
                <ul class="space-y-3 text-white/90 text-base">
                    <li><a href="{{ route('kurikulum.publik') }}" class="footer-link">Kurikulum Akademik</a></li>
                    <li><a href="{{ route('fasilitas.index') }}" class="footer-link">Fasilitas</a></li>
                    <li><a href="{{ route('publik.penelitian') }}" class="footer-link">Penelitian & Riset</a></li>
                    <li><a href="{{ route('laboratorium.pinjam') }}" class="footer-link">Form Peminjaman & Bahan</a></li>
                    <li><a href="{{ route('lab.cek-status') }}" class="footer-link">Cek Status Permohonan</a></li>
                </ul>
            </div>

            {{-- KOLOM 3: KONTAK --}}
            <div class="md:col-span-4">
                <h3 class="font-serif text-[22px] font-bold mb-6 text-[var(--gold)] border-b border-white/20 pb-2 inline-block">Hubungi Kami</h3>
                <div class="space-y-4 text-white/90 text-base">
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
        <div class="mt-12 pt-6 border-t border-white/20">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-xs text-white/80 uppercase tracking-[0.1em]">
                    &copy; {{ date('Y') }} Program Studi Bioteknologi Institut Teknologi Del. 
                </p>
                <p class="text-xs text-white/80 uppercase tracking-[0.1em]">
                    Developed by <span class="text-[var(--gold)] font-bold">Sesilia, Ferdy,</span>
                </p>
            </div>
        </div>
    </div>
</footer>