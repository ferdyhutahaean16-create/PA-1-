@extends('layouts.main') @section('title', 'Profil Program Studi - Bioteknologi')

@section('content')
<div class="bg-gray-50 py-8 border-b border-gray-200">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="text-sm text-gray-500 mb-2">Beranda / Profil Umum</div>
        <h1 class="text-3xl font-bold text-green-800">Profil Program Studi</h1>
    </div>
</div>

<div class="container mx-auto px-6 py-12 max-w-6xl">
    <div class="flex flex-col md:flex-row gap-10">
        
        <div class="w-full md:w-1/4">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden sticky top-24">
                <div class="bg-[#1f4e38] text-white font-bold px-6 py-4">
                    Menu Profil
                </div>
                <ul class="divide-y divide-gray-100">
                    <li>
                        <button onclick="switchTab('visi')" id="btn-visi" class="tab-btn w-full text-left px-6 py-4 text-green-800 bg-green-50 font-semibold transition flex justify-between items-center">
                            Visi & Misi 
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </li>
                    <li>
                        <button onclick="switchTab('sejarah')" id="btn-sejarah" class="tab-btn w-full text-left px-6 py-4 text-gray-600 hover:bg-gray-50 transition flex justify-between items-center">
                            Sejarah Singkat 
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </li>
                    <li>
                        <button onclick="switchTab('prospek')" id="btn-prospek" class="tab-btn w-full text-left px-6 py-4 text-gray-600 hover:bg-gray-50 transition flex justify-between items-center">
                            Prospek Karir 
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="w-full md:w-3/4">
            
            @if($profil)
                <div id="content-visi" class="tab-content block animate-fade-in">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-1.5 h-6 bg-yellow-500 rounded"></div>
                        <h2 class="text-2xl font-bold text-gray-800">Visi & Misi</h2>
                    </div>
                    
                    <div class="bg-[#f2fdf5] border-l-4 border-[#1f4e38] p-6 rounded-r-lg mb-8 shadow-sm">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Visi</h3>
                        <p class="text-gray-700 italic leading-relaxed">
                            "{{ $profil->visi }}"
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Misi</h3>
                        <div class="text-gray-700 leading-relaxed space-y-2">
                            {!! nl2br(e($profil->misi)) !!} 
                        </div>
                    </div>
                </div>

                <div id="content-sejarah" class="tab-content hidden animate-fade-in">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-1.5 h-6 bg-yellow-500 rounded"></div>
                        <h2 class="text-2xl font-bold text-gray-800">Sejarah Singkat</h2>
                    </div>
                    <div class="text-gray-700 leading-relaxed text-justify space-y-4">
                        {!! nl2br(e($profil->sejarah)) !!}
                    </div>
                </div>

                <div id="content-prospek" class="tab-content hidden animate-fade-in">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-1.5 h-6 bg-yellow-500 rounded"></div>
                        <h2 class="text-2xl font-bold text-gray-800">Prospek Karir</h2>
                    </div>
                    <div class="text-gray-700 leading-relaxed space-y-4 bg-white p-6 rounded-lg border border-gray-100 shadow-sm">
                        {!! nl2br(e($profil->prospek_karir)) !!}
                    </div>
                </div>
            @else
                <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 p-6 rounded-lg flex items-center gap-4">
                    <svg class="w-8 h-8 flex-shrink-0 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <div>
                        <h4 class="font-bold text-lg mb-1">Data Belum Tersedia</h4>
                        <p class="text-sm">Admin belum memasukkan data profil program studi. Silakan isi melalui Admin Panel terlebih dahulu.</p>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>

<script>
    function switchTab(tabName) {
        // 1. Sembunyikan semua konten
        document.querySelectorAll('.tab-content').forEach(el => {
            el.classList.add('hidden');
            el.classList.remove('block');
        });
        
        // 2. Reset warna semua tombol menu
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('text-green-800', 'bg-green-50', 'font-semibold');
            btn.classList.add('text-gray-600');
        });

        // 3. Tampilkan konten yang dipilih
        document.getElementById('content-' + tabName).classList.remove('hidden');
        document.getElementById('content-' + tabName).classList.add('block');

        // 4. Beri warna aktif pada tombol yang ditekan
        const activeBtn = document.getElementById('btn-' + tabName);
        activeBtn.classList.remove('text-gray-600');
        activeBtn.classList.add('text-green-800', 'bg-green-50', 'font-semibold');
    }
</script>

<style>
    /* Sedikit animasi agar perpindahan tab halus */
    .animate-fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(5px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection