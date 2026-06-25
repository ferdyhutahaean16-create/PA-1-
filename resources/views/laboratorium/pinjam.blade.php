@extends('layouts.main')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            
            {{-- Header Form --}}
            <div class="text-center pt-10 pb-6 px-8 relative">
                <div class="absolute top-6 right-6 flex items-center gap-2">
                    <span class="bg-green-50 text-green-700 text-xs font-bold px-3 py-1 rounded-full border border-green-200">Hi, {{ $nama }}</span>
                    <form action="{{ route('pinjam.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-xs text-gray-500 hover:text-red-500 font-bold transition">Logout</button>
                    </form>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Formulir Layanan Lab</h2>
                <p class="text-gray-500 text-sm">Pilih jenis form dan lengkapi data permohonan Anda.</p>
            </div>

            <div class="px-8 pb-10">
                <form action="{{ route('laboratorium.store') }}" method="POST" id="formLayanan">
                    {{-- NOTIFIKASI SUKSES --}}
                    @if(session('success'))
                        <div class="mb-8 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl p-5 flex items-start gap-4 shadow-sm relative overflow-hidden transition-all duration-500" role="alert">
                            {{-- Aksen Garis Hijau di kiri --}}
                            <div class="absolute top-0 left-0 w-1.5 h-full bg-emerald-500"></div>

                            <div class="p-2 bg-emerald-100/80 rounded-full shrink-0">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>

                            <div class="flex-1">
                                <h3 class="font-bold text-emerald-900 text-base mb-1">Permohonan Terkirim!</h3>
                                <p class="text-sm text-emerald-700 leading-relaxed">{{ session('success') }}</p>
                            </div>

                            {{-- Tombol Tutup --}}
                            <button onclick="this.parentElement.style.display='none'" type="button" class="text-emerald-500 hover:text-emerald-800 hover:bg-emerald-100 p-1.5 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-8 bg-red-50 border border-red-200 text-red-800 rounded-2xl p-5 flex items-start gap-4 shadow-sm relative overflow-hidden transition-all duration-500" role="alert">
                            <div class="absolute top-0 left-0 w-1.5 h-full bg-red-500"></div>

                            <div class="p-2 bg-red-100/80 rounded-full shrink-0">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>

                            <div class="flex-1">
                                <h3 class="font-bold text-red-900 text-base mb-1">Terjadi Kesalahan!</h3>
                                <ul class="text-sm text-red-700 list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <button onclick="this.parentElement.style.display='none'" type="button" class="text-red-500 hover:text-red-800 hover:bg-red-100 p-1.5 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    @endif
                    @csrf
                    
                    <input type="hidden" name="tipe_layanan" id="tipe_layanan" value="Peminjaman Alat">

                    {{-- Tombol Toggle Layanan --}}
                    <div class="flex flex-wrap justify-center gap-3 mb-8">
                        <button type="button" onclick="setKategoriForm('Alat', this)" class="btn-kategori-form bg-[var(--forest)] text-white border border-[var(--forest)] px-6 py-2.5 rounded-full font-bold text-xs uppercase tracking-widest transition shadow-md">
                            Form Alat Lab
                        </button>
                        <button type="button" onclick="setKategoriForm('Bahan', this)" class="btn-kategori-form bg-white text-gray-500 border border-gray-300 hover:text-[var(--forest)] px-6 py-2.5 rounded-full font-bold text-xs uppercase tracking-widest transition">
                            Form Bahan Kimia
                        </button>
                        <button type="button" onclick="setKategoriForm('Instrumen', this)" class="btn-kategori-form bg-white text-gray-500 border border-gray-300 hover:text-[var(--forest)] px-6 py-2.5 rounded-full font-bold text-xs uppercase tracking-widest transition">
                            Form Instrumen
                        </button>
                    </div>

                    <input type="hidden" name="kategori_peminjaman" id="kategori_form" value="Alat">

                    {{-- Data Diri Peminjam --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wider">Nama Peminjam <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_peminjam" value="{{ old('nama_peminjam', $nama) }}" placeholder="Ketik nama lengkap Anda" class="w-full p-3 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#1a4a38] outline-none transition text-gray-800" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wider">NIM / NIK <span class="text-red-500">*</span></label>
                            <input type="text" name="nim" value="{{ old('nim', $identitas) }}" placeholder="Ketik NIM / NIK Anda" class="w-full p-3 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#1a4a38] outline-none transition text-gray-800" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wider">Program Studi / Unit</label>
                            <input type="text" name="program_studi" value="{{ $prodi }}" class="w-full p-3 bg-gray-100 border border-gray-200 rounded-xl text-gray-600 outline-none cursor-not-allowed" readonly required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wider">Ruang Lab Tujuan <span class="text-red-500">*</span></label>
                            <input type="text" name="ruang_lab" value="{{ old('ruang_lab') }}" placeholder="Contoh: Lab Mikrobiologi" class="w-full p-3 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#1a4a38] outline-none transition text-gray-800" required>
                        </div>
                    </div>

                    {{-- 💡 Input Tanggal Rencana Pinjam & Kembali --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wider">Rencana Pinjam <span class="text-red-500">*</span></label>
                            <input type="date" name="rencana_pinjam" value="{{ old('rencana_pinjam') }}" class="w-full p-3 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#1a4a38] outline-none transition text-gray-800" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wider">Rencana Kembali <span class="text-red-500">*</span></label>
                            <input type="date" name="rencana_kembali" value="{{ old('rencana_kembali') }}" class="w-full p-3 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#1a4a38] outline-none transition text-gray-800" required>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wider">Judul Penelitian / Praktikum <span class="text-red-500">*</span></label>
                        <textarea name="judul_penelitian" rows="2" class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#1a4a38] outline-none transition" required></textarea>
                    </div>

                    {{-- PEMILIHAN BARANG DINAMIS --}}
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 mb-8">
                        <h3 class="font-bold text-gray-800 mb-4" id="label_daftar">Daftar Alat/Instrumen yang Dipinjam</h3>
                        
                        <div class="mt-8 bg-white border-2 border-dashed border-gray-300 p-6 rounded-xl">
                            <h4 class="text-sm font-bold text-gray-700 mb-4 uppercase tracking-wider flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                Daftar Barang yang Dipinjam
                            </h4>

                            <div id="daftar_keranjang" class="space-y-3 mb-4">
                                <p id="keranjang_kosong" class="text-gray-400 italic text-sm text-center py-4">Pilih barang dengan menekan tombol "+ Pinjam" pada katalog di bawah.</p>
                            </div>
                        </div>

                    {{-- Tombol Submit --}}
                    <button type="submit" class="w-full bg-[#1a4a38] hover:bg-[#0c241c] text-white font-bold py-4 rounded-xl shadow-lg transition-transform transform hover:-translate-y-1 text-lg mt-4">
                        Kirim Permohonan Lab
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- ======================================================== --}}
    {{-- BAGIAN KATALOG INVENTARIS (DI BAWAH FORM PEMINJAMAN)     --}}
    {{-- ======================================================== --}}
    
    <div class="mt-16 pt-12 border-t-2 border-dashed border-gray-200 pb-20">
        <div class="text-center mb-10">
            <h2 class="font-serif text-3xl text-[var(--forest-dark)] font-bold mb-3">Katalog Laboratorium</h2>
            <p class="text-gray-500 text-sm">Cek ketersediaan alat, bahan, dan instrumen sebelum Anda menambahkannya ke daftar pinjaman di atas.</p>
        </div>
        <div class="flex flex-wrap justify-center gap-3 mb-10">
            <button type="button" onclick="switchKatalogTab('tab-alat', this)" class="katalog-tab-btn active-tab px-6 py-2.5 rounded-full font-bold text-xs uppercase tracking-widest border border-[var(--forest)] bg-[var(--forest)] text-white transition">
                Alat Lab
            </button>
            <button type="button" onclick="switchKatalogTab('tab-bahan', this)" class="katalog-tab-btn px-6 py-2.5 rounded-full font-bold text-xs uppercase tracking-widest border border-gray-300 bg-white text-gray-500 hover:text-[var(--forest)] transition">
                Bahan Kimia
            </button>
            <button type="button" onclick="switchKatalogTab('tab-instrumen', this)" class="katalog-tab-btn px-6 py-2.5 rounded-full font-bold text-xs uppercase tracking-widest border border-gray-300 bg-white text-gray-500 hover:text-[var(--forest)] transition">
                Instrumen Aset
            </button>
        </div>
        <style>
            .katalog-content { display: none; opacity: 0; transform: translateY(10px); transition: all 0.4s ease-out; }
            .katalog-content.active { display: block; opacity: 1; transform: translateY(0); }
            .item-card { transition: all 0.3s ease; border: 1px solid #f3f4f6; }
            .item-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px -5px rgba(26, 74, 56, 0.15); border-color: #c6a54a; }
        </style>

        <div id="tab-alat" class="katalog-content active container mx-auto px-4 max-w-6xl">
                @if($alat->isEmpty())
                    <div class="text-center py-10 bg-white rounded-2xl border border-gray-100"><p class="text-gray-400 italic text-sm">Belum ada data Alat Laboratorium yang terdaftar.</p></div>
                @else
                    <div class="overflow-x-auto rounded-2xl border border-gray-200 shadow-sm bg-white custom-scrollbar">
                        <table class="w-full text-left border-collapse text-sm whitespace-nowrap">
                            <thead class="bg-blue-50/80 text-blue-900 font-bold uppercase text-[10px] tracking-wider border-b-2 border-blue-100">
                                <tr>
                                    <th class="p-4 text-center border-r border-blue-100/50 w-16">No</th>
                                    <th class="p-4 border-r border-blue-100/50">Jenis Barang</th>
                                    <th class="p-4 text-center border-r border-blue-100/50">Jumlah Barang</th>
                                    <th class="p-4 text-center border-r border-blue-100/50 w-32">Tahun</th>
                                    <th class="p-4 text-center w-48">Penyimpanan</th>
                                    <th class="p-4 text-center w-24">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-700">
                                @foreach($alat as $index => $item)
                                    <tr class="hover:bg-blue-50/30 transition">
                                        <td class="p-4 text-center text-gray-500">{{ $index + 1 }}</td>
                                        <td class="p-4 font-bold text-gray-800">{{ $item->item_name }}</td>
                                        <td class="p-4 text-center">
                                            <span class="bg-gray-100 px-3 py-1 rounded-full text-xs font-semibold">
                                                {{ $item->quantity }} {{ $item->unit }}
                                            </span>
                                        </td>
                                        <td class="p-4 text-center text-gray-600 font-mono text-xs">
                                            {{ $item->year ?? '-' }}
                                        </td>
                                        <td class="p-4 text-center font-medium">
                                            <span class="bg-amber-50 text-amber-700 border border-amber-100/50 px-3 py-1.5 rounded uppercase text-[10px] tracking-wider font-bold">
                                                {{ $item->storage ?? $item->lab_location ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="p-4 text-center">
                                            <button type="button" onclick="tambahKeForm({{ $item->id }}, '{{ addslashes($item->item_name) }}', '{{ $item->quantity }}', 'Alat')" class="bg-emerald-100 text-emerald-700 hover:bg-emerald-600 hover:text-white px-4 py-2 rounded-lg text-xs font-bold transition shadow-sm">
                                                + Pinjam
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        <div id="tab-bahan" class="katalog-content container mx-auto px-4 max-w-6xl">
                @if($bahan->isEmpty())
                    <div class="text-center py-10 bg-white rounded-2xl border border-gray-100"><p class="text-gray-400 italic text-sm">Belum ada data Bahan Kimia yang terdaftar.</p></div>
                @else
                    <div class="overflow-x-auto rounded-2xl border border-gray-200 shadow-sm bg-white custom-scrollbar">
                        <table class="w-full text-left border-collapse text-sm whitespace-nowrap">
                            <thead class="bg-emerald-50/80 text-emerald-900 font-bold uppercase text-[10px] tracking-wider border-b-2 border-emerald-100">
                                <tr>
                                    <th rowspan="2" class="p-4 text-center border-r border-emerald-100/50 align-middle">No</th>
                                    <th rowspan="2" class="p-4 border-r border-emerald-100/50 align-middle">Nama Bahan</th>
                                    <th rowspan="2" class="p-4 border-r border-emerald-100/50 align-middle">Rumus Kimia</th>
                                    <th rowspan="2" class="p-4 text-center border-r border-emerald-100/50 align-middle">Jumlah</th>
                                    <th colspan="2" class="p-2 text-center border-r border-emerald-100/50 border-b border-emerald-100/50">Berat</th>
                                    <th rowspan="2" class="p-4 text-center border-r border-emerald-100/50 align-middle leading-tight">Tanggal<br>Kadaluarsa</th>
                                    <th rowspan="2" class="p-4 border-r border-emerald-100/50 align-middle">Keterangan</th>
                                    <th colspan="2" class="p-2 text-center border-emerald-100/50 border-b border-emerald-100/50">Letak</th>
                                </tr>
                                <tr>
                                    <th class="p-2 text-center border-r border-emerald-100/50">Kotor</th>
                                    <th class="p-2 text-center border-r border-emerald-100/50">Bersih</th>
                                    <th class="p-2 text-center border-r border-emerald-100/50">Lemari</th>
                                    <th class="p-2 text-center">Lab/GD</th>
                                    <th class="p-4 text-center w-24">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-700">
                                @foreach($bahan as $index => $item)
                                    <tr class="hover:bg-emerald-50/30 transition">
                                        <td class="p-4 text-center text-gray-500">{{ $index + 1 }}</td>
                                        <td class="p-4 font-bold text-gray-800">{{ $item->item_name }}</td>
                                        <td class="p-4 font-mono text-xs text-gray-600">{{ $item->chemical_formula ?? '-' }}</td>
                                        <td class="p-4 text-center">
                                            <span class="bg-gray-100 px-2 py-1 rounded text-xs font-semibold">{{ $item->quantity }} {{ $item->unit }}</span>
                                        </td>
                                        <td class="p-4 text-center text-gray-600">{{ $item->gross_weight ?? '-' }}</td>
                                        <td class="p-4 text-center text-emerald-700 font-bold">{{ $item->net_weight ?? '-' }}</td>
                                        <td class="p-4 text-center text-gray-600">
                                            {{ $item->expiry_date ? \Carbon\Carbon::parse($item->expiry_date)->format('d/m/Y') : '-' }}
                                        </td>
                                        <td class="p-4 text-xs text-gray-500 max-w-[150px] truncate" title="{{ $item->description }}">
                                            {{ $item->description ?? '-' }}
                                        </td>
                                        <td class="p-4 text-center font-medium">{{ $item->cupboard_location ?? '-' }}</td>
                                        <td class="p-4 text-center font-medium">
                                            <span class="bg-amber-50 text-amber-700 px-2 py-1 rounded text-xs">{{ $item->lab_location ?? '-' }}</span>
                                        </td>
                                        <td class="p-4 text-center">
                                            <button type="button" onclick="tambahKeForm({{ $item->id }}, '{{ addslashes($item->item_name) }}', '{{ $item->quantity }}', 'Bahan')" class="bg-emerald-100 text-emerald-700 hover:bg-emerald-600 hover:text-white px-4 py-2 rounded-lg text-xs font-bold transition shadow-sm">
                                                + Pinjam
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-xs text-gray-400 mt-4 text-center flex justify-center items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                        Geser tabel ke kiri/kanan (scroll) untuk melihat detail spesifikasi penuh.
                    </p>
                @endif
            </div>

        <div id="tab-instrumen" class="katalog-content container mx-auto px-4 max-w-6xl">
                
                @php
                    // FILTER SUPER CERDAS YANG ANDA BUAT (Disesuaikan dengan model bahasa Inggris)
                    $aset_bahan = collect();
                    $aset_barang = collect();

                    foreach($instrumen as $item) {
                        $is_bahan = false;
                        
                        $nama = strtolower($item->item_name ?? '');
                        $ciri_kimia = ['asam', 'hidroksida', 'klorida', 'asetat', 'nitrat', 'barium', 'etanol', 'metanol', 'akuades', 'sulfat', 'oksida', 'amonium'];
                        foreach($ciri_kimia as $ciri) {
                            if (str_contains($nama, $ciri)) {
                                $is_bahan = true;
                                break;
                            }
                        }

                        if (!$is_bahan) {
                            $satuan = strtolower(trim($item->unit ?? ''));
                            $jumlah = strtolower(trim((string)($item->quantity ?? '')));
                            $kriteria_satuan = ['ml', 'l', 'liter', 'gr', 'gram', 'kg', 'mg', 'ktk', 'box', 'botol', 'wadah', 'bungkus'];
                            
                            if (in_array($satuan, $kriteria_satuan)) {
                                $is_bahan = true;
                            } else {
                                foreach ($kriteria_satuan as $k) {
                                    if (str_contains($jumlah, $k) || str_contains($satuan, $k)) {
                                        $is_bahan = true;
                                        break;
                                    }
                                }
                            }
                        }

                        if ($is_bahan) {
                            $aset_bahan->push($item);
                        } else {
                            $aset_barang->push($item);
                        }
                    }
                @endphp

                @if($instrumen->isEmpty())
                    <div class="text-center py-10 bg-white rounded-2xl border border-gray-100"><p class="text-gray-400 italic text-sm">Belum ada data Instrumen Aset yang terdaftar.</p></div>
                @else
                    
                    {{-- TABEL 1: JENIS BARANG --}}
                    <div class="mb-12">
                        <div class="flex items-center gap-4 mb-5 pl-2">
                            <h4 class="font-serif text-2xl text-[var(--forest-dark)] font-bold">1. Kategori: Jenis Barang</h4>
                            <div class="h-[1px] flex-1 bg-gray-200"></div>
                        </div>
                        
                        @if($aset_barang->isEmpty())
                            <div class="text-center py-6 bg-gray-50 rounded-xl border border-dashed border-gray-200"><p class="text-gray-400 italic text-sm">Data Jenis Barang kosong.</p></div>
                        @else
                            <div class="overflow-x-auto rounded-2xl border border-gray-200 shadow-sm bg-white custom-scrollbar">
                                <table class="w-full text-left border-collapse text-sm whitespace-nowrap">
                                    <thead class="bg-purple-50/80 text-purple-900 font-bold uppercase text-[10px] tracking-wider border-b-2 border-purple-100">
                                        <tr>
                                            <th class="p-4 text-center border-r border-purple-100/50 w-16">No</th>
                                            <th class="p-4 border-r border-purple-100/50 w-48">Kd_Barang</th>
                                            <th class="p-4 border-r border-purple-100/50">Jenis_Barang</th>
                                            <th class="p-4 text-center border-r border-purple-100/50 w-40">Jumlah Barang</th>
                                            <th class="p-4 text-center border-r border-purple-100/50">Lokasi / Ruangan</th>
                                            <th class="p-4 text-right w-48">Harga</th>
                                            <th class="p-4 text-center w-24">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 text-gray-700">
                                        @foreach($aset_barang->values() as $index => $item)
                                            <tr class="hover:bg-purple-50/30 transition">
                                                <td class="p-4 text-center text-gray-500">{{ $index + 1 }}</td>
                                                <td class="p-4 font-mono text-xs text-gray-600">{{ $item->item_code ?? '-' }}</td>
                                                <td class="p-4 font-bold text-gray-800">{{ $item->item_name }}</td>
                                                <td class="p-4 text-center">
                                                    @if(trim((string)$item->quantity) != '' || trim($item->unit) != '')
                                                        <span class="bg-gray-100 px-3 py-1 rounded-full text-xs font-semibold">
                                                            {{ trim($item->quantity . ' ' . $item->unit) }}
                                                        </span>
                                                    @else
                                                        <span class="text-gray-400 font-bold">-</span>
                                                    @endif
                                                </td>
                                                <td class="p-4 text-center font-medium">
                                                    @if(!empty($item->lab_location))
                                                        <span class="bg-purple-50 text-purple-700 border border-purple-100/50 px-3 py-1.5 rounded text-xs">
                                                            {{ $item->lab_location }}
                                                        </span>
                                                    @else
                                                        <span class="text-gray-400 font-bold">-</span>
                                                    @endif
                                                </td>
                                                <td class="p-4 text-right font-medium text-gray-700">
                                                    @if($item->price)
                                                        @php $clean_harga = preg_replace('/[^0-9]/', '', $item->price); @endphp
                                                        {{ $clean_harga != '' ? 'Rp ' . number_format((int)$clean_harga, 0, ',', '.') : $item->price }}
                                                    @else
                                                        <span class="text-gray-400 font-bold">-</span>
                                                    @endif
                                                </td>
                                                <td class="p-4 text-center">
                                                    <button type="button" onclick="tambahKeForm({{ $item->id }}, '{{ addslashes($item->item_name) }}', '{{ $item->quantity }}', 'Instrumen')" class="bg-emerald-100 text-emerald-700 hover:bg-emerald-600 hover:text-white px-4 py-2 rounded-lg text-xs font-bold transition shadow-sm">
                                                        + Pinjam
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>

                    {{-- TABEL 2: BAHAN --}}
                    <div>
                        <div class="flex items-center gap-4 mb-5 pl-2">
                            <h4 class="font-serif text-2xl text-[var(--forest-dark)] font-bold">2. Kategori: Bahan</h4>
                            <div class="h-[1px] flex-1 bg-gray-200"></div>
                        </div>
                        
                        @if($aset_bahan->isEmpty())
                            <div class="text-center py-6 bg-gray-50 rounded-xl border border-dashed border-gray-200"><p class="text-gray-400 italic text-sm">Data Bahan kosong.</p></div>
                        @else
                            <div class="overflow-x-auto rounded-2xl border border-gray-200 shadow-sm bg-white custom-scrollbar">
                                <table class="w-full text-left border-collapse text-sm whitespace-nowrap">
                                    <thead class="bg-amber-50/80 text-amber-900 font-bold uppercase text-[10px] tracking-wider border-b-2 border-amber-100">
                                        <tr>
                                            <th class="p-4 text-center border-r border-amber-100/50 w-16">No</th>
                                            <th class="p-4 border-r border-amber-100/50">Nama Bahan</th>
                                            <th class="p-4 text-center w-48">Stok Aktual</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 text-gray-700">
                                        @foreach($aset_bahan->values() as $index => $item)
                                            <tr class="hover:bg-amber-50/30 transition">
                                                <td class="p-4 text-center text-gray-500">{{ $index + 1 }}</td>
                                                <td class="p-4 font-bold text-gray-800">{{ $item->item_name }}</td>
                                                <td class="p-4 text-center">
                                                    <span class="bg-amber-50 text-amber-700 border border-amber-100 px-3 py-1.5 rounded-full text-xs font-bold shadow-sm">
                                                        {{ $item->quantity }} {{ $item->unit }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>

                @endif
            </div>

        <script>
            function switchKatalogTab(tabId, btn) {
                document.querySelectorAll('.katalog-content').forEach(el => el.classList.remove('active'));
                document.querySelectorAll('.katalog-tab-btn').forEach(el => {
                    el.classList.remove('active-tab', 'bg-[var(--forest)]', 'text-white', 'border-[var(--forest)]');
                    el.classList.add('bg-white', 'text-gray-500', 'border-gray-300');
                });
                document.getElementById(tabId).classList.add('active');
                btn.classList.add('active-tab', 'bg-[var(--forest)]', 'text-white', 'border-[var(--forest)]');
                btn.classList.remove('bg-white', 'text-gray-500', 'border-gray-300');
            }
        </script>

{{-- SCRIPT LOGIKA DINAMIS --}}
<script>
document.addEventListener('DOMContentLoaded', function() {

    // FUNGSI GANTI KATEGORI FORM
    window.setKategoriForm = function(kategori, btn) {
        document.getElementById('kategori_form').value = kategori;
        
        document.querySelectorAll('.btn-kategori-form').forEach(el => {
            el.classList.remove('bg-[var(--forest)]', 'text-white', 'border-[var(--forest)]');
            el.classList.add('bg-white', 'text-gray-500', 'border-gray-300');
        });
        
        btn.classList.add('bg-[var(--forest)]', 'text-white', 'border-[var(--forest)]');
        btn.classList.remove('bg-white', 'text-gray-500', 'border-gray-300');

        document.getElementById('daftar_keranjang').innerHTML = '<p id="keranjang_kosong" class="text-gray-400 italic text-sm text-center py-4">Pilih barang dengan menekan tombol "+ Pinjam" pada katalog di bawah.</p>';
    }

    // FUNGSI TAMBAH KE KERANJANG DARI KATALOG
    window.tambahKeForm = function(id, nama, stokDatabase, kategoriItem) {
        const formKategori = document.getElementById('kategori_form').value;

        if (kategoriItem !== formKategori) {
            alert(`Peringatan: Anda sedang mengisi form [${formKategori}]. Anda tidak bisa memasukkan [${kategoriItem}] ke keranjang ini!`);
            return;
        }

        const stokAktual = parseInt(stokDatabase) || 0;

        if (stokAktual <= 0) {
            alert(`Maaf, stok ${nama} sedang habis!`);
            return;
        }

        if (document.getElementById(`item-${id}`)) {
            alert(`${nama} sudah ada di keranjang Anda.`);
            return;
        }

        let qty = prompt(`Berapa jumlah ${nama} yang ingin dipinjam? (Stok: ${stokDatabase})`, "1");
        qty = parseInt(qty);

        if (isNaN(qty) || qty <= 0) return;
        if (qty > stokAktual) {
            alert(`Jumlah melebihi stok yang tersedia!`);
            return;
        }

        const txtKosong = document.getElementById('keranjang_kosong');
        if(txtKosong) txtKosong.remove();

        const html = `
            <div id="item-${id}" class="flex justify-between items-center bg-gray-50 p-3 rounded-lg border border-gray-200 shadow-sm animate-fade-in keranjang-item">
                <div>
                    <p class="font-bold text-sm text-gray-800">${nama}</p>
                    <input type="hidden" name="barang_id[]" value="${id}">
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-xs font-bold bg-white px-3 py-1.5 border border-gray-200 rounded text-emerald-700">Qty: ${qty}</span>
                    <input type="hidden" name="jumlah_pinjam[]" value="${qty}">
                    <button type="button" onclick="hapusDariKeranjang('${id}')" class="text-red-400 hover:text-red-600 font-bold px-2">X</button>
                </div>
            </div>
        `;
        document.getElementById('daftar_keranjang').insertAdjacentHTML('beforeend', html);
        
        document.getElementById('label_daftar').scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    window.hapusDariKeranjang = function(id) {
        document.getElementById(`item-${id}`).remove();
        
        const keranjang = document.getElementById('daftar_keranjang');
        if (keranjang.querySelectorAll('.keranjang-item').length === 0) {
            keranjang.innerHTML = '<p id="keranjang_kosong" class="text-gray-400 italic text-sm text-center py-4">Pilih barang dengan menekan tombol "+ Pinjam" pada katalog di bawah.</p>';
        }
    }

    document.getElementById('formLayanan').addEventListener('submit', function(event) {
        const jumlahBarang = document.querySelectorAll('input[name="barang_id[]"]').length;

        if (jumlahBarang === 0) {
            event.preventDefault(); 
            document.getElementById('tab-alat').scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });

});
</script>
@endsection