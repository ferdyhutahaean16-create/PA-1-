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

<div class="relative w-full bg-gray-50 py-10 md:py-12 overflow-hidden border-b border-gray-100">
    
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1581093588401-fbb62a02f120?q=80&w=2070&auto=format&fit=crop" 
             alt="Faculty Background" 
             class="w-full h-full object-cover opacity-15 mix-blend-overlay">
    </div>

    <div class="absolute inset-0 bg-gradient-to-r from-[#0d2a1f]/70 via-transparent to-[#0d2a1f]/70 z-0"></div>

    <div class="relative z-10 container mx-auto px-6 text-center flex flex-col items-center justify-center">
        
        <h1 class="font-serif text-3xl md:text-4xl text-[#0d2a1f] font-bold tracking-tight mb-3">
            Tenaga Pendidik
        </h1>
        
        <div class="w-20 h-px bg-yellow-500/30"></div>
    </div>
</div>

<div class="bg-[var(--soft-bg)] py-20 min-h-screen font-sans">
    <div class="container mx-auto px-4 md:px-6 max-w-6xl">
        
        <div class="grid grid-cols-1 gap-16">
            @forelse($lecturers as $lecturer)
            <div class="faculty-card overflow-hidden">
                
                <div class="flex flex-wrap border-b border-gray-200 bg-gray-50/80 pt-3 px-3 gap-1">
                    <button onclick="switchTab('profil-{{ $lecturer->id }}', this)" class="tab-btn active text-gray-500 px-5 py-4 text-xs md:text-sm font-bold tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        PROFIL
                    </button>
                    <button onclick="switchTab('pengajaran-{{ $lecturer->id }}', this)" class="tab-btn text-gray-500 px-5 py-4 text-xs md:text-sm font-bold tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        PENGAJARAN
                    </button>
                    <button onclick="switchTab('riset-{{ $lecturer->id }}', this)" class="tab-btn text-gray-500 px-5 py-4 text-xs md:text-sm font-bold tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        PUBLIKASI
                    </button>
                    <button onclick="switchTab('pengabdian-{{ $lecturer->id }}', this)" class="tab-btn text-gray-500 px-5 py-4 text-xs md:text-sm font-bold tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                        PENGABDIAN
                    </button>
                    <button onclick="switchTab('publikasi-{{ $lecturer->id }}', this)" class="tab-btn text-gray-500 px-5 py-4 text-xs md:text-sm font-bold tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        PENELITIAN
                    </button>
                    <button onclick="switchTab('prestasi-{{ $lecturer->id }}', this)" class="tab-btn text-gray-500 px-5 py-4 text-xs md:text-sm font-bold tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        LAINNYA
                    </button>
                </div>

                <div class="p-8 md:p-12">
                    
                    {{-- TAB: PROFIL --}}
                    <div id="profil-{{ $lecturer->id }}" class="tab-content active">
                        <div class="flex flex-col lg:flex-row gap-12 items-start">
                            
                            <div class="w-full lg:w-1/3 shrink-0 flex justify-center">
                                <div class="relative w-64 md:w-72 aspect-[3/4]">
                                    <div class="absolute inset-0 border-2 border-[var(--gold)] rounded-2xl transform translate-x-4 translate-y-4"></div>
                                    <div class="relative w-full h-full bg-gray-100 rounded-2xl flex items-center justify-center overflow-hidden shadow-md">
                                        @if($lecturer->photo)
                                            <img src="{{ asset($lecturer->photo) }}" alt="Foto {{ $lecturer->name }}" class="w-full h-full object-cover">
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
                                    {{ $lecturer->name }}
                                </h2>
                                <p class="text-lg font-medium mb-10 text-[var(--gold)]">
                                    {{ $lecturer->position }}
                                </p>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                                    <div>
                                        <h4 class="text-[10px] font-bold tracking-[0.15em] mb-1 text-[var(--gold)]">NIDN</h4>
                                        <p class="text-gray-900 font-semibold">{{ $lecturer->nidn }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-[10px] font-bold tracking-[0.15em] mb-1 text-[var(--gold)]">EMAIL OFFICIAL</h4>
                                        <a href="mailto:{{ $lecturer->email }}" class="text-blue-600 font-semibold hover:underline break-words">{{ $lecturer->email }}</a>
                                    </div>
                                    <div class="md:col-span-2">
                                        <h4 class="text-[10px] font-bold tracking-[0.15em] mb-1 text-[var(--gold)]">KANTOR</h4>
                                        <p class="text-gray-900 font-semibold">{{ $lecturer->office_room }}</p>
                                    </div>
                                </div>

                                <hr class="border-gray-200 mb-8">

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-4">
                                    <div>
                                        <h4 class="text-[10px] font-bold tracking-[0.15em] mb-4 text-[var(--gold)]">LATAR BELAKANG PENDIDIKAN</h4>
                                        <ul class="space-y-3">
                                            @foreach(explode(',', $lecturer->education) as $pendidikan)
                                                @if(trim($pendidikan) != '')
                                                <li class="flex items-start gap-3">
                                                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-[var(--forest)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                                                    <span class="text-gray-600 leading-snug">{{ trim($pendidikan) }}</span>
                                                </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div>
                                        <h4 class="text-[10px] font-bold tracking-[0.15em] mb-4 text-[var(--gold)]">BIDANG MINAT PENELITIAN</h4>
                                        @if($lecturer->link_scholar)
                                            <a href="{{ $lecturer->link_scholar }}" target="_blank" class="inline-flex items-center gap-3 px-5 py-3 bg-white border-2 border-gray-100 rounded-xl text-sm font-bold text-gray-700 hover:bg-[#1a4a38] hover:border-[#1a4a38] hover:text-white transition-all duration-300 shadow-sm group">
                                                <svg class="w-5 h-5 text-[#1a4a38] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                                Profil Google Scholar
                                            </a>
                                        @else
                                            <p class="text-sm text-gray-400 italic bg-gray-50 p-3 rounded-lg inline-block border border-gray-100">
                                                Profil Scholar belum ditambahkan.
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- TAB: PENGAJARAN --}}
                    <div id="pengajaran-{{ $lecturer->id }}" class="tab-content">
                        <div class="mb-8">
                            <h3 class="font-serif text-3xl text-[var(--forest-dark)] mb-2">Riwayat Pengajaran</h3>
                            <p class="text-sm text-gray-500">Daftar mata kuliah yang diampu di Institut Teknologi Del.</p>
                        </div>

                        <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">
                            <table class="min-w-full divide-y divide-gray-200 text-left">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-4 text-[11px] font-bold tracking-wider uppercase text-gray-500 w-16 text-center">No</th>
                                        <th class="px-6 py-4 text-[11px] font-bold tracking-wider uppercase text-gray-500">Mata Kuliah</th>
                                        <th class="px-6 py-4 text-[11px] font-bold tracking-wider uppercase text-gray-500 text-center">Semester</th>
                                        <th class="px-6 py-4 text-[11px] font-bold tracking-wider uppercase text-gray-500 text-center">Tahun Akademik</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    
                                    @forelse($lecturer->teachings as $index => $ajar)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 font-medium text-gray-500 text-center">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 font-bold text-gray-900">{{ $ajar->course_name }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-600 text-center">
                                            <span class="bg-gray-100 px-3 py-1 rounded-full text-xs font-semibold">{{ $ajar->semester ?? '-' }}</span>
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-600 text-center">
                                            <span class="bg-[#1a4a38]/10 text-[#1a4a38] border border-[#1a4a38]/20 px-3 py-1 rounded-full text-xs font-bold tracking-wider">
                                                {{ $ajar->academic_year ?? '-' }}
                                            </span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-12 text-center border-2 border-dashed border-gray-100 bg-gray-50">
                                            <svg class="w-10 h-10 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                            <p class="text-gray-500 italic text-sm">Belum ada data riwayat pengajaran yang ditambahkan.</p>
                                        </td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- TAB: PUBLIKASI --}}
                    <div id="riset-{{ $lecturer->id }}" class="tab-content">
                        <div class="mb-8">
                            <h3 class="font-serif text-3xl text-[var(--forest-dark)] mb-2">Publikasi Karya Ilmiah</h3>
                            <p class="text-sm text-gray-500">Daftar karya ilmiah, jurnal, dan prosiding ilmiah yang telah diterbitkan.</p>
                        </div>

                        @if($lecturer->publications && $lecturer->publications->count() > 0)
                            <div class="space-y-8">
                                @foreach($lecturer->publications as $riset)
                                    <div class="bg-gray-50/50 rounded-2xl p-6 md:p-8 border border-gray-100 shadow-sm flex flex-col md:flex-row gap-6 items-start">
                                        
                                        @if($riset->cover_image)
                                            <div class="w-full md:w-1/5 shrink-0 shadow-sm rounded-xl overflow-hidden border border-gray-200 aspect-[3/4] bg-white">
                                                <img src="{{ asset($riset->cover_image) }}" alt="Cover {{ $riset->title }}" class="w-full h-full object-cover">
                                            </div>
                                        @endif

                                        <div class="flex-1">
                                            <div class="flex flex-wrap items-center gap-2 mb-3">
                                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-700 border border-emerald-200">
                                                    {{ $riset->publication_type ?? 'Jurnal Ilmiah' }}
                                                </span>
                                                <span class="text-xs text-gray-400 font-medium">
                                                    • {{ $riset->publication_date }}
                                                </span>
                                            </div>

                                            <h4 class="text-xl font-bold text-gray-900 mb-2 leading-snug">
                                                {{ $riset->title }}
                                            </h4>

                                            <p class="text-xs font-bold text-[var(--gold)] uppercase tracking-wider mb-4">
                                                Penulis: {{ $riset->author }}
                                            </p>

                                            @if($riset->description)
                                                <div class="text-sm text-gray-600 leading-relaxed bg-white p-4 rounded-xl border border-gray-100 mb-4 prose max-w-none shadow-inner text-justify">
                                                    <span class="font-bold text-[var(--forest)] block mb-1 text-xs uppercase tracking-wider">Abstrak / Deskripsi :</span>
                                                    {!! $riset->description !!}
                                                </div>
                                            @endif

                                            <div class="flex flex-wrap gap-3">
                                                @if($riset->download_link)
                                                    <a href="{{ $riset->download_link }}" target="_blank" class="inline-flex items-center gap-2 text-xs font-bold bg-[var(--forest)] text-white px-4 py-2.5 rounded-lg hover:bg-[var(--forest-dark)] transition shadow-sm">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                                        Unduh PDF
                                                    </a>
                                                @endif

                                                @if($riset->view_link)
                                                    <a href="{{ $riset->view_link }}" target="_blank" class="inline-flex items-center gap-2 text-xs font-bold border border-gray-300 text-gray-700 bg-white px-4 py-2.5 rounded-lg hover:bg-gray-50 transition shadow-sm">
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
                                <p class="text-gray-500 italic">Belum ada data publikasi ilmiah yang tercatat untuk tenaga pendidik ini.</p>
                            </div>
                        @endif
                    </div>

                    {{-- TAB: PENGABDIAN --}}
                    <div id="pengabdian-{{ $lecturer->id }}" class="tab-content">
                        <div class="mb-8">
                            <h3 class="font-serif text-3xl text-[var(--forest-dark)] mb-2">Pengabdian Masyarakat (PKM)</h3>
                            <p class="text-sm text-gray-500">Dokumentasi program pengabdian kepada masyarakat yang diinisiasi dosen.</p>
                        </div>
                        
                        <div class="flex flex-col gap-4 pt-2">
                            @forelse($lecturer->activities as $pkm)
                                <div class="bg-white border border-gray-100 rounded-2xl p-6 md:p-8 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col text-left group">
                                    <div class="flex items-center gap-3 mb-4">
                                        <span class="bg-[#1a4a38]/10 text-[#1a4a38] text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider">
                                            {{ $pkm->category }}
                                        </span>
                                        <span class="text-gray-300 text-xs">•</span>
                                        <span class="text-gray-500 text-xs font-bold">
                                            {{ $pkm->execution_time }}
                                        </span>
                                    </div>

                                    <h4 class="text-lg md:text-xl font-bold text-gray-800 mb-3 leading-snug group-hover:text-[#1a4a38] transition-colors">
                                        {{ $pkm->title }}
                                    </h4>

                                    @if($pkm->location)
                                        <p class="text-xs text-gray-500 mb-3 font-semibold">
                                            Lokasi: <span class="text-gray-700">{{ $pkm->location }}</span>
                                        </p>
                                    @endif

                                    @if($pkm->description)
                                        <div class="text-sm text-gray-600 leading-relaxed">
                                            {!! $pkm->description !!}
                                        </div>
                                    @endif
                                </div>
                            @empty
                                <div class="text-center py-12 px-4 border-2 border-dashed border-gray-200 rounded-3xl bg-gray-50">
                                    <svg class="w-12 h-12 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    <p class="text-gray-500 italic text-sm">Belum ada data Pengabdian kepada Masyarakat (PkM) untuk tenaga pendidik ini.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- TAB: PENELITIAN --}}
                    <div id="publikasi-{{ $lecturer->id }}" class="tab-content">
                        <div class="mb-8">
                            <h3 class="font-serif text-3xl text-[var(--forest-dark)] mb-2">Penelitian & Riset Dasar</h3>
                            <p class="text-sm text-gray-500">Daftar judul penelitian hibah, internal, maupun nasional yang diampu dosen.</p>
                        </div>

                        <div class="flex flex-col gap-4 pt-2">
                            @forelse($lecturer->researches as $riset)
                                <div class="bg-gray-50/50 border border-gray-100 rounded-xl p-4 hover:shadow-sm transition-all">
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="bg-[#1a4a38]/10 text-[#1a4a38] text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider">
                                            {{ $riset->category }}
                                        </span>
                                        <span class="text-gray-300 text-xs">•</span>
                                        <span class="text-gray-500 text-xs font-bold">{{ $riset->year }}</span>
                                    </div>

                                    <h4 class="text-md font-bold text-gray-800 mb-1 leading-snug">{{ $riset->title }}</h4>
                                    <p class="text-xs text-gray-500 mb-3 uppercase tracking-wide">
                                        Penulis: <span class="font-bold text-gray-700">{{ $riset->author }}</span>
                                    </p>

                                    @if($riset->description)
                                        <p class="text-sm text-gray-600 line-clamp-2 mb-4 leading-relaxed">
                                            {{ strip_tags($riset->description) }}
                                        </p>
                                    @endif

                                    <div class="flex flex-wrap gap-2 mt-auto">
                                        @if($riset->pdf_file)
                                            <a href="{{ asset($riset->pdf_file) }}" target="_blank" class="inline-flex items-center gap-1.5 bg-[#1a4a38] text-white px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-[#0f2e22] transition-colors shadow-sm">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                                PDF
                                            </a>
                                        @endif

                                        @if($riset->journal_link)
                                            <a href="{{ $riset->journal_link }}" target="_blank" class="inline-flex items-center gap-1.5 border border-gray-200 text-gray-600 px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-gray-50 transition-colors">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                                Sumber Jurnal
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <p class="text-sm text-gray-400 italic">Belum ada publikasi atau penelitian riset untuk dosen ini.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- TAB: LAINNYA (PRESTASI) --}}
                    <div id="prestasi-{{ $lecturer->id }}" class="tab-content">
                        <div class="mb-8">
                            <h3 class="font-serif text-3xl text-[var(--forest-dark)] mb-2">Penghargaan & Prestasi Dosen</h3>
                            <p class="text-sm text-gray-500">Daftar pencapaian akademik dan non-akademik tingkat nasional maupun internasional.</p>
                        </div>

                        <div class="mt-6">
                            <div class="flex flex-col gap-5">
                                @php
                                    $prestasiDosen = $lecturer->achievements->where('category', 'Dosen');
                                @endphp
                                @forelse($prestasiDosen as $prestasi)
                                    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col sm:flex-row gap-6 items-start group text-left">

                                        <div class="flex-1">
                                            <div class="flex items-center gap-3 mb-3">
                                                <span class="bg-yellow-50 text-yellow-700 text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider border border-yellow-100">
                                                    Tingkat {{ $prestasi->level ?? 'Nasional' }}
                                                </span>
                                                <span class="text-gray-300 text-xs">•</span>
                                                <span class="text-gray-500 text-xs font-bold">
                                                    {{ \Carbon\Carbon::parse($prestasi->date_earned)->format('Y') }}
                                                </span>
                                            </div>

                                            <h4 class="text-lg font-bold text-gray-800 mb-2 leading-snug group-hover:text-yellow-600 transition-colors">
                                                {{ $prestasi->achievement_name }}
                                            </h4>

                                            <p class="text-xs text-gray-500 mb-3 font-semibold uppercase tracking-wide">
                                                Penyelanggara: <span class="text-gray-700">{{ $prestasi->organizer ?? '-' }}</span>
                                            </p>

                                            @if($prestasi->description)
                                                <p class="text-sm text-gray-600 leading-relaxed line-clamp-2">
                                                    {{ $prestasi->description }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-12 px-4 border-2 border-dashed border-gray-200 rounded-3xl bg-gray-50 w-full mt-2">
                                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                        <p class="text-gray-500 italic text-sm">Belum ada data penghargaan atau prestasi untuk tenaga pendidik ini.</p>
                                    </div>
                                @endforelse
                            </div>
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
        const card = btnElement.closest('.faculty-card');

        card.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.remove('active');
        });

        const targetTab = document.getElementById(tabId);
        targetTab.classList.add('active');

        card.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active');
            btn.classList.add('text-gray-500');
        });

        btnElement.classList.add('active');
        btnElement.classList.remove('text-gray-500');
    }
</script>
@endsection