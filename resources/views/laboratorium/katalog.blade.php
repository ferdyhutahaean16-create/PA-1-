@extends('layouts.main')

@section('title', 'Katalog Inventaris Lab - Bioteknologi IT Del')

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
    border-color: var(--forest);
}

/* Item Card */
.item-card {
    background: white;
    border: 1px solid rgba(0, 0, 0, 0.05);
    border-radius: 1.5rem;
    transition: all 0.3s ease;
}
.item-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px -10px rgba(26, 74, 56, 0.1);
    border-color: rgba(198, 165, 74, 0.5); /* Gold hover border */
}
</style>

<div class="relative w-full bg-[var(--forest-dark)] overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>
    <div class="relative z-10 py-24 text-center px-6">
        <span class="inline-block text-[var(--gold)] tracking-[0.5em] uppercase text-[10px] font-bold mb-4">Laboratory Facilities</span>
        <h1 class="font-serif text-5xl md:text-6xl text-white font-light tracking-tight">Katalog Inventaris Lab</h1>
        <p class="text-gray-300 mt-6 max-w-2xl mx-auto font-sans text-lg">Informasi ketersediaan stok alat, bahan habis pakai, dan instrumen laboratorium secara *real-time*.</p>
        <div class="w-24 h-[1px] bg-[var(--gold)] mx-auto mt-8 opacity-60"></div>
    </div>
</div>

<div class="bg-[var(--soft-bg)] py-16 min-h-screen font-sans">
    <div class="container mx-auto px-6 max-w-7xl">
        
        <div class="flex flex-wrap justify-center gap-4 mb-16">
            <button onclick="switchTab('tab-alat', this)" class="tab-btn active-tab px-8 py-3.5 rounded-full font-bold text-xs uppercase tracking-widest border border-gray-200 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Alat Laboratorium
            </button>
            <button onclick="switchTab('tab-bahan', this)" class="tab-btn bg-white text-gray-500 hover:text-[var(--forest)] px-8 py-3.5 rounded-full font-bold text-xs uppercase tracking-widest border border-gray-200 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                Bahan Kimia
            </button>
            <button onclick="switchTab('tab-instrumen', this)" class="tab-btn bg-white text-gray-500 hover:text-[var(--forest)] px-8 py-3.5 rounded-full font-bold text-xs uppercase tracking-widest border border-gray-200 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                Instrumen Aset
            </button>
        </div>

        <div id="tab-alat" class="tab-content active">
            @if($alat->isEmpty())
                <div class="text-center py-16 bg-white rounded-3xl border border-gray-100 shadow-sm">
                    <p class="text-gray-400 italic">Belum ada data Alat Laboratorium yang terdaftar.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($alat as $item)
                        <div class="item-card p-6 flex flex-col h-full">
                            <div class="flex justify-between items-start mb-4">
                                <span class="bg-blue-50 text-blue-700 text-[9px] font-bold px-3 py-1 rounded-full uppercase tracking-wider border border-blue-100">Alat Lab</span>
                                @if($item->quantity > 0)
                                    <span class="text-emerald-600 bg-emerald-50 px-2 py-1 rounded text-xs font-bold shadow-sm">Tersedia</span>
                                @else
                                    <span class="text-red-500 bg-red-50 px-2 py-1 rounded text-xs font-bold shadow-sm">Kosong</span>
                                @endif
                            </div>
                            <h3 class="font-bold text-lg text-gray-800 mb-2 leading-tight">{{ $item->item_name }}</h3>
                            
                            <div class="mt-auto pt-4 space-y-2">
                                <div class="flex justify-between items-center text-sm border-t border-gray-50 pt-3">
                                    <span class="text-gray-500">Stok Saat Ini:</span>
                                    <span class="font-bold text-[var(--forest-dark)] text-lg">{{ $item->quantity }} <span class="text-xs font-normal text-gray-500 uppercase">{{ $item->unit ?? 'Unit' }}</span></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div id="tab-bahan" class="tab-content">
            @if($bahan->isEmpty())
                <div class="text-center py-16 bg-white rounded-3xl border border-gray-100 shadow-sm">
                    <p class="text-gray-400 italic">Belum ada data Bahan Kimia yang terdaftar.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($bahan as $item)
                        <div class="item-card p-6 flex flex-col h-full">
                            <div class="flex justify-between items-start mb-4">
                                <span class="bg-amber-50 text-amber-700 text-[9px] font-bold px-3 py-1 rounded-full uppercase tracking-wider border border-amber-100">Bahan Habis Pakai</span>
                                @if($item->quantity > 0)
                                    <span class="text-emerald-600 bg-emerald-50 px-2 py-1 rounded text-xs font-bold shadow-sm">Tersedia</span>
                                @else
                                    <span class="text-red-500 bg-red-50 px-2 py-1 rounded text-xs font-bold shadow-sm">Kosong</span>
                                @endif
                            </div>
                            <h3 class="font-bold text-lg text-gray-800 mb-2 leading-tight">{{ $item->item_name }}</h3>
                            
                            <div class="mt-auto pt-4 space-y-2">
                                <div class="flex justify-between items-center text-sm border-t border-gray-50 pt-3">
                                    <span class="text-gray-500">Sisa Volume/Stok:</span>
                                    <span class="font-bold text-[var(--forest-dark)] text-lg">{{ $item->quantity }} <span class="text-xs font-normal text-gray-500 uppercase">{{ $item->unit }}</span></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div id="tab-instrumen" class="tab-content">
            @if($instrumen->isEmpty())
                <div class="text-center py-16 bg-white rounded-3xl border border-gray-100 shadow-sm">
                    <p class="text-gray-400 italic">Belum ada data Instrumen Aset yang terdaftar.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($instrumen as $item)
                        <div class="item-card p-6 flex flex-col h-full">
                            <div class="flex justify-between items-start mb-4">
                                <span class="bg-purple-50 text-purple-700 text-[9px] font-bold px-3 py-1 rounded-full uppercase tracking-wider border border-purple-100">Instrumen Aset</span>
                                @if($item->quantity > 0)
                                    <span class="text-emerald-600 bg-emerald-50 px-2 py-1 rounded text-xs font-bold shadow-sm">Tersedia</span>
                                @else
                                    <span class="text-red-500 bg-red-50 px-2 py-1 rounded text-xs font-bold shadow-sm">Digunakan</span>
                                @endif
                            </div>
                            <h3 class="font-bold text-lg text-gray-800 mb-2 leading-tight">{{ $item->item_name }}</h3>
                            
                            <div class="mt-auto pt-4 space-y-2">
                                <div class="flex justify-between items-center text-sm border-t border-gray-50 pt-3">
                                    <span class="text-gray-500">Jumlah Unit:</span>
                                    <span class="font-bold text-[var(--forest-dark)] text-lg">{{ $item->quantity }} <span class="text-xs font-normal text-gray-500 uppercase">{{ $item->unit ?? 'Unit' }}</span></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mt-20 text-center">
            <p class="text-gray-500 mb-6 font-medium">Sudah menemukan alat atau bahan yang Anda butuhkan?</p>
            <a href="{{ route('pinjam.logout') }}" class="inline-flex items-center gap-3 bg-[var(--gold)] text-white px-10 py-4 rounded-full font-bold uppercase tracking-widest hover:bg-[#b0903a] transition shadow-xl hover:-translate-y-1 transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                Ajukan Permohonan Lab
            </a>
        </div>

    </div>
</div>

<script>
    function switchTab(tabId, btn) {
        // Menyembunyikan semua konten tab
        document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
        
        // Mereset gaya semua tombol
        document.querySelectorAll('.tab-btn').forEach(el => {
            el.classList.remove('active-tab', 'text-white');
            el.classList.add('bg-white', 'text-gray-500');
            el.style.borderColor = '#e5e7eb';
        });

        // Menampilkan tab yang dipilih
        document.getElementById(tabId).classList.add('active');
        
        // Mengubah warna tombol yang aktif menjadi hijau
        btn.classList.add('active-tab', 'text-white');
        btn.classList.remove('bg-white', 'text-gray-500');
        btn.style.borderColor = '#1a4a38';
    }
</script>
@endsection