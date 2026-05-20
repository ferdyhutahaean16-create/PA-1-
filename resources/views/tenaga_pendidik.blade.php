@extends('layouts.main')
@section('title', 'Tenaga Pendidik - Prodi Bioteknologi IT Del')

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

/* Faculty Card Design */
.faculty-card {
    background: rgba(255, 255, 255, 0.95);
    border: 1px solid rgba(255, 255, 255, 0.6);
    border-radius: 2rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 10px 30px -10px rgba(26, 74, 56, 0.08);
}

.faculty-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 25px 50px -12px rgba(26, 74, 56, 0.15);
}

/* Tabs Styling */
.tab-btn {
    transition: all 0.3s ease;
    border-bottom: 3px solid transparent;
}
.tab-btn.active {
    background-color: var(--forest);
    color: white;
    border-radius: 0.5rem 0.5rem 0 0;
}
.tab-btn:not(.active):hover {
    color: var(--forest);
    background-color: rgba(26, 74, 56, 0.05);
    border-radius: 0.5rem 0.5rem 0 0;
}
.tab-content {
    display: none;
    animation: fadeIn 0.4s ease-in-out forwards;
}
.tab-content.active {
    display: block;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<div class="relative w-full bg-[var(--forest-dark)] overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>
    <div class="relative z-10 py-24 text-center px-6">
        <span class="inline-block text-[var(--gold)] tracking-[0.5em] uppercase text-[10px] font-bold mb-4">Academic Excellence</span>
        <h1 class="font-serif text-5xl md:text-6xl text-white font-light tracking-tight">Tenaga Pendidik</h1>
        <div class="w-24 h-[1px] bg-[var(--gold)] mx-auto mt-8 opacity-60"></div>
    </div>
</div>

<div class="bg-[var(--soft-bg)] py-20 min-h-screen font-sans">
    <div class="container mx-auto px-4 md:px-6 max-w-6xl">
        
        <div class="grid grid-cols-1 gap-16">
            @forelse($tenaga_pendidiks as $tenaga_pendidik)
            <div class="faculty-card overflow-hidden">
                
                <div class="flex flex-wrap border-b border-gray-200 bg-gray-50/80 pt-3 px-3 gap-1">
                    <button onclick="switchTab('profil-{{ $tenaga_pendidik->id }}', this)" class="tab-btn active text-gray-500 px-5 py-4 text-xs md:text-sm font-bold tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        PROFIL
                    </button>
                    <button onclick="switchTab('pengajaran-{{ $tenaga_pendidik->id }}', this)" class="tab-btn text-gray-500 px-5 py-4 text-xs md:text-sm font-bold tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        PENGAJARAN
                    </button>
                    <button onclick="switchTab('riset-{{ $tenaga_pendidik->id }}', this)" class="tab-btn text-gray-500 px-5 py-4 text-xs md:text-sm font-bold tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        RISET
                    </button>
                    <button onclick="switchTab('pengabdian-{{ $tenaga_pendidik->id }}', this)" class="tab-btn text-gray-500 px-5 py-4 text-xs md:text-sm font-bold tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                        PENGABDIAN
                    </button>
                </div>

                <div class="p-8 md:p-12">
                    
                    <div id="profil-{{ $tenaga_pendidik->id }}" class="tab-content active">
                        <div class="flex flex-col lg:flex-row gap-12 items-start">
                            
                            <div class="w-full lg:w-1/3 shrink-0 flex justify-center">
                                <div class="relative w-64 md:w-72 aspect-[3/4]">
                                    <div class="absolute inset-0 border-2 border-[var(--gold)] rounded-2xl transform translate-x-4 translate-y-4"></div>
                                    <div class="relative w-full h-full bg-gray-100 rounded-2xl flex items-center justify-center overflow-hidden shadow-md">
                                        @if($tenaga_pendidik->foto)
                                            <img src="{{ asset($tenaga_pendidik->foto) }}" alt="Foto {{ $tenaga_pendidik->nama }}" class="w-full h-full object-cover">
                                        @else
                                            <svg class="w-24 h-24 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="w-full lg:w-2/3">
                                <div class="inline-block px-4 py-1.5 rounded-full text-[10px] font-bold tracking-[0.2em] uppercase mb-5 bg-[var(--forest)] text-[var(--gold)]">
                                    Faculty Member
                                </div>
                                
                                <h2 class="font-serif text-4xl md:text-5xl text-[var(--forest-dark)] mb-2 leading-tight">
                                    {{ $tenaga_pendidik->nama }}
                                </h2>
                                <p class="text-lg font-medium mb-10 text-[var(--gold)]">
                                    {{ $tenaga_pendidik->jabatan }}
                                </p>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                                    <div>
                                        <h4 class="text-[10px] font-bold tracking-[0.15em] mb-1 text-[var(--gold)]">NIDN</h4>
                                        <p class="text-gray-900 font-semibold">{{ $tenaga_pendidik->nidn }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-[10px] font-bold tracking-[0.15em] mb-1 text-[var(--gold)]">EMAIL OFFICIAL</h4>
                                        <a href="mailto:{{ $tenaga_pendidik->email }}" class="text-blue-600 font-semibold hover:underline break-words">{{ $tenaga_pendidik->email }}</a>
                                    </div>
                                    <div class="md:col-span-2">
                                        <h4 class="text-[10px] font-bold tracking-[0.15em] mb-1 text-[var(--gold)]">KANTOR</h4>
                                        <p class="text-gray-900 font-semibold">{{ $tenaga_pendidik->ruangan }}</p>
                                    </div>
                                </div>

                                <hr class="border-gray-200 mb-8">

                                <div>
                                    <h4 class="text-[10px] font-bold tracking-[0.15em] mb-4 text-[var(--gold)]">LATAR BELAKANG PENDIDIKAN</h4>
                                    <ul class="space-y-3">
                                        @foreach(explode(',', $tenaga_pendidik->lulusan) as $pendidikan)
                                            @if(trim($pendidikan) != '')
                                            <li class="flex items-start gap-3">
                                                <svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-[var(--forest)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                                                <span class="text-gray-600 leading-snug">{{ trim($pendidikan) }}</span>
                                            </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="pengajaran-{{ $tenaga_pendidik->id }}" class="tab-content">
                        <div class="mb-8">
                            <h3 class="font-serif text-3xl text-[var(--forest-dark)] mb-2">Riwayat Pengajaran</h3>
                            <p class="text-sm text-gray-500">Daftar mata kuliah yang diampu di Institut Teknologi Del.</p>
                        </div>

                        @if($tenaga_pendidik->pengajarans && $tenaga_pendidik->pengajarans->count() > 0)
                            <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">
                                <table class="min-w-full divide-y divide-gray-200 text-left">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-4 text-[11px] font-bold tracking-wider uppercase text-gray-500">Mata Kuliah</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach($tenaga_pendidik->pengajarans as $ajar)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-6 py-4 font-medium text-gray-900">{{ $ajar->mata_khulia ?? $ajar->mata_kuliah }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-12 bg-gray-50 rounded-xl border-2 border-dashed border-gray-200">
                                <p class="text-gray-500 italic">Belum ada data pengajaran.</p>
                            </div>
                        @endif
                    </div>

                    <div id="riset-{{ $tenaga_pendidik->id }}" class="tab-content">
                        <div class="mb-8">
                            <h3 class="font-serif text-3xl text-[var(--forest-dark)] mb-2">Publikasi & Riset</h3>
                            <p class="text-sm text-gray-500">Daftar karya ilmiah, jurnal, dan penelitian ilmiah yang telah diterbitkan.</p>
                        </div>

                        @if($tenaga_pendidik->publikasis && $tenaga_pendidik->publikasis->count() > 0)
                            <div class="space-y-8">
                                @foreach($tenaga_pendidik->publikasis as $riset)
                                    <div class="bg-gray-50/50 rounded-2xl p-6 md:p-8 border border-gray-100 shadow-sm flex flex-col md:flex-row gap-6 items-start">
                                        
                                        @if($riset->gambar)
                                            <div class="w-full md:w-1/5 shrink-0 shadow-sm rounded-xl overflow-hidden border border-gray-200 aspect-[3/4] bg-white">
                                                <img src="{{ asset($riset->gambar) }}" alt="Cover {{ $riset->judul }}" class="w-full h-full object-cover">
                                            </div>
                                        @endif

                                        <div class="flex-1">
                                            <div class="flex flex-wrap items-center gap-2 mb-3">
                                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-700 border border-emerald-200">
                                                    {{ $riset->tipe_publikasi ?? 'Jurnal Ilmiah' }}
                                                </span>
                                                <span class="text-xs text-gray-400 font-medium">
                                                    • {{ $riset->tanggal_publikasi }}
                                                </span>
                                            </div>

                                            <h4 class="text-xl font-bold text-gray-900 mb-2 leading-snug">
                                                {{ $riset->judul }}
                                            </h4>

                                            <p class="text-xs font-bold text-[var(--gold)] uppercase tracking-wider mb-4">
                                                Penulis: {{ $riset->penulis }}
                                            </p>

                                            @if($riset->deskripsi)
                                                <div class="text-sm text-gray-600 leading-relaxed bg-white p-4 rounded-xl border border-gray-100 mb-4 prose max-w-none shadow-inner text-justify">
                                                    <span class="font-bold text-[var(--forest)] block mb-1 text-xs uppercase tracking-wider">Abstrak / Deskripsi :</span>
                                                    {!! $riset->deskripsi !!}
                                                </div>
                                            @endif

                                            <div class="flex flex-wrap gap-3">
                                                @if($riset->link_download)
                                                    <a href="{{ $riset->link_download }}" target="_blank" class="inline-flex items-center gap-2 text-xs font-bold bg-[var(--forest)] text-white px-4 py-2.5 rounded-lg hover:bg-[var(--forest-dark)] transition shadow-sm">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                                        Unduh PDF
                                                    </a>
                                                @endif

                                                @if($riset->link_view)
                                                    <a href="{{ $riset->link_view }}" target="_blank" class="inline-flex items-center gap-2 text-xs font-bold border border-gray-300 text-gray-700 bg-white px-4 py-2.5 rounded-lg hover:bg-gray-50 transition shadow-sm">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                                        Lihat Sumber Jurnal
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12 bg-gray-50 rounded-xl border-2 border-dashed border-gray-200">
                                <p class="text-gray-500 italic">Belum ada riwayat publikasi ilmiah atau riset yang tercatat untuk tenaga pendidik ini.</p>
                            </div>
                        @endif
                    </div>

                    <div id="pengabdian-{{ $tenaga_pendidik->id }}" class="tab-content">
                        <div class="mb-8">
                            <h3 class="font-serif text-3xl text-[var(--forest-dark)] mb-2">Pengabdian Masyarakat</h3>
                        </div>
                        <div class="text-center py-12 bg-gray-50 rounded-xl border-2 border-dashed border-gray-200">
                            <p class="text-gray-500 italic">Modul Pengabdian sedang dalam pengembangan.</p>
                        </div>
                    </div>

                </div>
            </div>
            @empty
            <div class="faculty-card p-20 text-center border-dashed border-2 border-gray-300">
                <p class="text-gray-400 font-serif text-2xl italic">Data dosen sedang diperbarui.</p>
            </div>
            @endforelse
        </div>
        
    </div>
</div>

<script>
    function switchTab(tabId, btnElement) {
        // Cari elemen card terdekat agar aksi tab hanya berlaku untuk dosen ini saja
        const card = btnElement.closest('.faculty-card');

        // 1. Sembunyikan semua tab di dalam card ini
        card.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.remove('active');
        });

        // 2. Tampilkan tab yang diklik
        const targetTab = document.getElementById(tabId);
        targetTab.classList.add('active');

        // 3. Reset warna semua tombol tab di dalam card ini
        card.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active');
            btn.classList.add('text-gray-500');
        });

        // 4. Aktifkan warna tombol yang diklik
        btnElement.classList.add('active');
        btnElement.classList.remove('text-gray-500');
    }
</script>
@endsection