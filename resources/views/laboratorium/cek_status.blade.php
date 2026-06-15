@extends('layouts.main')

@section('title', 'Lacak Permohonan - Prodi Bioteknologi IT Del')

@section('content')
<!-- Tailwind & Google Fonts -->
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">

<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: { 
                    'jakarta': ['Plus Jakarta Sans', 'sans-serif'],
                    'serif': ['Playfair Display', 'serif']
                },
                colors: {
                    'itdel-green': '#1a4a38',
                    'itdel-dark': '#0f2d22',
                    'itdel-gold': '#eab308',
                    'itdel-soft': '#f8fafc',
                }
            }
        }
    }
</script>

<style>
    body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fcfcfc; }
    .hero-gradient {
        background: linear-gradient(rgba(26, 74, 56, 0.95), rgba(15, 45, 34, 0.98)), 
                    url('https://www.del.ac.id/wp-content/uploads/2013/05/gedung-del.jpg');
        background-size: cover;
        background-position: center;
    }
    .status-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .status-card:hover {
        border-color: #eab308;
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
    }
</style>

<div class="min-h-screen pb-20">
    
    <!-- Hero Section: Mewah & Serasi dengan Homepage -->
    <div class="hero-gradient pt-24 pb-32 px-6 relative overflow-hidden">
        <!-- Dekorasi Aksen Gold -->
        <div class="absolute top-0 left-0 w-full h-1.5 bg-itdel-gold"></div>
        
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <p class="text-itdel-gold font-bold tracking-[0.4em] uppercase text-xs mb-4">Monitoring System</p>
            <h1 class="font-serif text-4xl md:text-5xl text-white mb-6 italic">Lacak Permohonan Laboratorium</h1>
            <div class="h-0.5 w-24 bg-itdel-gold/50 mx-auto mb-8"></div>
            <p class="text-white/70 text-sm md:text-base font-light italic max-w-2xl mx-auto">
                "Shaping the World Through Biotechnology"
            </p>
        </div>
    </div>

    <!-- Search Hub: Elemen Floating -->
    <div class="max-w-3xl mx-auto -mt-16 px-6 relative z-20">
        <div class="bg-white p-2 rounded-[2rem] shadow-2xl border border-slate-100">
            <form action="{{ route('lab.cek-status') }}" method="GET" class="flex flex-col md:flex-row gap-2">
                <div class="relative flex-grow">
                    <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-itdel-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m1 5l4-4m0 0l4 4m-4-4v12"></path></svg>
                    </div>
                    <input type="text" name="nim" value="{{ $nim }}" placeholder="Masukkan Nomor Induk Mahasiswa..." 
                           class="w-full pl-14 pr-6 py-5 bg-transparent rounded-[1.5rem] focus:outline-none font-bold text-itdel-green placeholder:text-slate-300">
                </div>
                <button type="submit" class="bg-itdel-green hover:bg-itdel-dark text-white font-black px-10 py-5 rounded-[1.5rem] transition-all flex items-center justify-center gap-3 shadow-lg hover:shadow-itdel-green/20">
                    <span>CARI DATA</span>
                    <svg class="w-4 h-4 text-itdel-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </form>
        </div>
    </div>

    @if($nim)
        <div class="max-w-6xl mx-auto mt-20 px-6">
            <div class="flex items-center gap-4 mb-10">
                <div class="w-12 h-12 bg-itdel-green rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-itdel-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold text-itdel-green uppercase tracking-tight">Riwayat Peminjaman</h2>
                    <p class="text-slate-400 text-xs">Menampilkan hasil pencarian untuk <span class="text-itdel-green font-bold">{{ $nim }}</span></p>
                </div>
            </div>

            @if($peminjamans->isEmpty())
                <div class="status-card p-20 rounded-[3rem] text-center">
                    <p class="text-slate-400 italic">Data tidak ditemukan. Silakan pastikan NIM anda sudah benar.</p>
                </div>
            @else
                <div class="space-y-6">
                    @foreach($peminjamans as $p)
                    <div class="status-card p-8 rounded-[2.5rem] flex flex-col md:flex-row items-center gap-8">
                        <!-- Waktu & Kategori -->
                        <div class="text-center md:text-left min-w-[150px]">
                            <p class="text-[10px] font-black text-itdel-gold uppercase tracking-[0.2em] mb-1">{{ $p->kategori_peminjaman ?? $p->jenis_form }}</p>
                            <p class="text-sm font-bold text-itdel-green">{{ $p->created_at->format('d M Y') }}</p>
                            <p class="text-[10px] text-slate-400 font-mono">{{ $p->created_at->format('H:i') }} WIB</p>
                        </div>

                        <!-- Info Judul -->
                        <div class="flex-grow text-center md:text-left">
                            <h3 class="text-lg font-bold text-slate-800 leading-tight mb-2">{{ $p->judul_penelitian ?? $p->nama_kegiatan ?? $p->keperluan }}</h3>
                            <div class="flex items-center justify-center md:justify-start gap-2 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">
                                <svg class="w-3 h-3 text-itdel-green" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path></svg>
                                {{ $p->ruang_lab ?? $p->laboratorium ?? 'Lab Bioteknologi' }}
                            </div>
                            
                            @if($p->rencana_pinjam && $p->rencana_kembali)
                            <div class="inline-flex items-center justify-center md:justify-start gap-1.5 text-[10px] font-bold text-slate-500 bg-slate-50 px-3 py-1.5 rounded-lg border border-slate-200 mt-2">
                                <svg class="w-3.5 h-3.5 text-itdel-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                Jadwal: <span class="text-itdel-green">{{ \Carbon\Carbon::parse($p->rencana_pinjam)->format('d M Y') }}</span> 
                                <span class="text-slate-400">s/d</span> 
                                <span class="text-itdel-green">{{ \Carbon\Carbon::parse($p->rencana_kembali)->format('d M Y') }}</span>
                            </div>
                            @endif
                        </div>

                        <!-- Status Badge -->
                        <div class="min-w-[180px] flex flex-col items-center">
                            @php
                                // Warna Default untuk "Selesai" (Abu-abu elegan)
                                $statusStyle = 'bg-slate-50 text-slate-500 border border-slate-200'; 
                                
                                // Deteksi setiap fase secara spesifik
                                if($p->status == 'Pending') $statusStyle = 'bg-yellow-50 text-yellow-700 border border-yellow-200';
                                if($p->status == 'Disetujui') $statusStyle = 'bg-green-50 text-green-700 border border-green-200';
                                if($p->status == 'Ditolak') $statusStyle = 'bg-red-50 text-red-700 border border-red-200';
                            @endphp
                            <div class="px-6 py-2 rounded-full text-[10px] font-black uppercase tracking-widest {{ $statusStyle }} mb-2">
                                {{ $p->status }}
                            </div>
                            <p class="text-[9px] text-slate-400 italic text-center px-4">{{ $p->catatan_admin ?? 'Tidak ada catatan' }}</p>
                        </div>

                        <!-- Aksi -->
                        <div class="min-w-[150px] text-right">
                            @if($p->status == 'Disetujui')
                                <a href="{{ route('lab.peminjaman.cetak', $p->id) }}" target="_blank" 
                                   class="inline-flex items-center gap-2 bg-itdel-green hover:bg-itdel-dark text-white text-[10px] font-black px-6 py-3 rounded-2xl shadow-lg transition-all transform hover:-translate-y-1">
                                    <svg class="w-4 h-4 text-itdel-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2z"></path></svg>
                                    UNDUH PDF
                                </a>
                            @else
                                <span class="text-[10px] font-bold text-slate-300 uppercase italic">Akses Terkunci</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endif
</div>
@endsection