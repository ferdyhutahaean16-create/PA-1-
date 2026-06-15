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
                <p class="text-gray-500 text-sm">Pilih jenis layanan dan lengkapi data permohonan Anda.</p>
            </div>

            <div class="px-8 pb-10">
                <form action="{{ route('laboratorium.store') }}" method="POST" id="formLayanan">
                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-5">
                            <p class="font-bold">Gagal Mengirim Form!</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
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
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Rencana Tanggal Peminjaman</label>
                                <input type="date" name="rencana_pinjam" required
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[var(--forest)]">
                            </div>
                        
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Rencana Tanggal Pengembalian</label>
                                <input type="date" name="rencana_kembali" required
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[var(--forest)]">
                            </div>
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
                    <button type="submit" class="w-full bg-[#1a4a38] hover:bg-[#0c241c] text-white font-bold py-4 rounded-xl shadow-lg transition-transform transform hover:-translate-y-1 text-lg">
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
    
    <div class="mt-16 pt-12 border-t-2 border-dashed border-gray-200">
        <div class="text-center mb-10">
            <h2 class="font-serif text-3xl text-[var(--forest-dark)] font-bold mb-3">Referensi Katalog Laboratorium</h2>
            <p class="text-gray-500 text-sm">Cek ketersediaan alat, bahan, dan instrumen sebelum Anda menambahkannya ke daftar pinjaman di atas.</p>
        </div>
        <!-- TOMBOL NAVIGASI TAB -->
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
        <!-- TAB KONTEN 1: ALAT LABORATORIUM (TAMPILAN TABEL) -->
            <div id="tab-alat" class="katalog-content active">
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
                                        
                                        {{-- Nama Alat --}}
                                        <td class="p-4 font-bold text-gray-800">{{ $item->nama_barang }}</td>
                                        
                                        {{-- Jumlah & Satuan --}}
                                        <td class="p-4 text-center">
                                            <span class="bg-gray-100 px-3 py-1 rounded-full text-xs font-semibold">
                                                {{ $item->jumlah }} {{ $item->satuan ?? 'Set' }}
                                            </span>
                                        </td>
                                        
                                        {{-- Tahun (Aman jika kosong) --}}
                                        <td class="p-4 text-center text-gray-600 font-mono text-xs">
                                            {{ $item->tahun ?? '-' }}
                                        </td>
                                        
                                        {{-- Penyimpanan (Gudang / R. Laboran) --}}
                                        <td class="p-4 text-center font-medium">
                                            <span class="bg-amber-50 text-amber-700 border border-amber-100/50 px-3 py-1.5 rounded uppercase text-[10px] tracking-wider font-bold">
                                                {{ $item->penyimpanan ?? $item->letak_lab ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="p-4 text-center">
                                            <button type="button" onclick="tambahKeForm({{ $item->id }}, '{{ addslashes($item->nama_barang) }}', '{{ $item->jumlah }}', 'Alat')" class="bg-emerald-100 text-emerald-700 hover:bg-emerald-600 hover:text-white px-4 py-2 rounded-lg text-xs font-bold transition shadow-sm">
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
        <!-- TAB KONTEN 2: BAHAN KIMIA (TAMPILAN TABEL DETAIL) -->
            <div id="tab-bahan" class="katalog-content">
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
                                        <td class="p-4 font-bold text-gray-800">{{ $item->nama_barang }}</td>
                                        
                                        {{-- Gunakan null coalescing (??) agar tidak eror jika kolom kosong --}}
                                        <td class="p-4 font-mono text-xs text-gray-600">{{ $item->rumus_kimia ?? '-' }}</td>
                                        
                                        <td class="p-4 text-center">
                                            <span class="bg-gray-100 px-2 py-1 rounded text-xs font-semibold">{{ $item->jumlah }} {{ $item->satuan }}</span>
                                        </td>
                                        
                                        <td class="p-4 text-center text-gray-600">{{ $item->berat_kotor ?? '-' }}</td>
                                        <td class="p-4 text-center text-emerald-700 font-bold">{{ $item->berat_bersih ?? '-' }}</td>
                                        
                                        <td class="p-4 text-center text-gray-600">
                                            {{ $item->tanggal_kadaluarsa ? \Carbon\Carbon::parse($item->tanggal_kadaluarsa)->format('d/m/Y') : '-' }}
                                        </td>
                                        
                                        <td class="p-4 text-xs text-gray-500 max-w-[150px] truncate" title="{{ $item->keterangan }}">
                                            {{ $item->keterangan ?? '-' }}
                                        </td>
                                        
                                        <td class="p-4 text-center font-medium">{{ $item->letak_lemari ?? '-' }}</td>
                                        <td class="p-4 text-center font-medium">
                                            <span class="bg-amber-50 text-amber-700 px-2 py-1 rounded text-xs">{{ $item->letak_lab ?? '-' }}</span>
                                        </td>
                                        <td class="p-4 text-center">
                                            <button type="button" onclick="tambahKeForm({{ $item->id }}, '{{ addslashes($item->nama_barang) }}', '{{ $item->jumlah }}', 'Bahan')" class="bg-emerald-100 text-emerald-700 hover:bg-emerald-600 hover:text-white px-4 py-2 rounded-lg text-xs font-bold transition shadow-sm">
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
        <!-- TAB KONTEN 3: INSTRUMEN ASET (TAMPILAN TABEL) -->
            <div id="tab-instrumen" class="katalog-content">
                
                @php
                    // =========================================================================
                    // FILTER SUPER CERDAS: Deteksi Multi-Lapis (Anti Gagal)
                    // =========================================================================
                    $aset_bahan = collect();
                    $aset_barang = collect();

                    foreach($instrumen as $item) {
                        $is_bahan = false;
                        
                        // LAPIS 1: Deteksi Langsung dari Nama Kimia (Paling Akurat)
                        // Jika nama barang mengandung unsur kimia, otomatis masuk ke Bahan
                        $nama = strtolower($item->nama_barang ?? '');
                        $ciri_kimia = ['asam', 'hidroksida', 'klorida', 'asetat', 'nitrat', 'barium', 'etanol', 'metanol', 'akuades', 'sulfat', 'oksida', 'amonium'];
                        foreach($ciri_kimia as $ciri) {
                            if (str_contains($nama, $ciri)) {
                                $is_bahan = true;
                                break;
                            }
                        }

                        // LAPIS 2: Deteksi dari Satuan atau Ketikan Jumlah (Jika bukan nama kimia)
                        if (!$is_bahan) {
                            $satuan = strtolower(trim($item->satuan ?? ''));
                            $jumlah = strtolower(trim($item->jumlah ?? ''));
                            $kriteria_satuan = ['ml', 'l', 'liter', 'gr', 'gram', 'kg', 'mg', 'ktk', 'box', 'botol', 'wadah', 'bungkus'];
                            
                            if (in_array($satuan, $kriteria_satuan)) {
                                $is_bahan = true;
                            } else {
                                foreach ($kriteria_satuan as $k) {
                                    // Membaca teks "800ml" yang menempel sekalipun
                                    if (str_contains($jumlah, $k) || str_contains($satuan, $k)) {
                                        $is_bahan = true;
                                        break;
                                    }
                                }
                            }
                        }

                        // LAPIS 3: Distribusi Presisi ke Tabel
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
                    
                    {{-- ========================================================== --}}
                    {{-- TABEL 1: JENIS BARANG (Gabungan Ada Harga & Tanpa Harga) --}}
                    {{-- ========================================================== --}}
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
                                                {{-- 1. Kolom No --}}
                                                <td class="p-4 text-center text-gray-500">{{ $index + 1 }}</td>
                                                
                                                {{-- 2. Kolom Kode Barang --}}
                                                <td class="p-4 font-mono text-xs text-gray-600">{{ $item->kd_barang ?? '-' }}</td>
                                                
                                                {{-- 3. Kolom Jenis Barang --}}
                                                <td class="p-4 font-bold text-gray-800">{{ $item->nama_barang }}</td>

                                                {{-- 4. Kolom Jumlah Barang (Dengan fitur fallback strip '-' jika kosong) --}}
                                                <td class="p-4 text-center">
                                                    @if(trim($item->jumlah) != '' || trim($item->satuan) != '')
                                                        <span class="bg-gray-100 px-3 py-1 rounded-full text-xs font-semibold">
                                                            {{ trim($item->jumlah . ' ' . $item->satuan) }}
                                                        </span>
                                                    @else
                                                        <span class="text-gray-400 font-bold">-</span>
                                                    @endif
                                                </td>
                                                
                                                {{-- 5. Kolom Lokasi / Ruangan --}}
                                                <td class="p-4 text-center font-medium">
                                                    @if(!empty($item->letak_lab))
                                                        <span class="bg-purple-50 text-purple-700 border border-purple-100/50 px-3 py-1.5 rounded text-xs">
                                                            {{ $item->letak_lab }}
                                                        </span>
                                                    @else
                                                        <span class="text-gray-400 font-bold">-</span>
                                                    @endif
                                                </td>

                                                {{-- 6. Kolom Harga --}}
                                                <td class="p-4 text-right font-medium text-gray-700">
                                                    @if($item->harga)
                                                        @php $clean_harga = preg_replace('/[^0-9]/', '', $item->harga); @endphp
                                                        {{ $clean_harga != '' ? 'Rp ' . number_format((int)$clean_harga, 0, ',', '.') : $item->harga }}
                                                    @else
                                                        <span class="text-gray-400 font-bold">-</span>
                                                    @endif
                                                </td>
                                                <td class="p-4 text-center">
                                                    <button type="button" onclick="tambahKeForm({{ $item->id }}, '{{ addslashes($item->nama_barang) }}', '{{ $item->jumlah }}', 'Instrumen')" class="bg-emerald-100 text-emerald-700 hover:bg-emerald-600 hover:text-white px-4 py-2 rounded-lg text-xs font-bold transition shadow-sm">
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

                    {{-- ========================================================== --}}
                    {{-- TABEL 2: BAHAN (Hanya Nama Bahan & Stok Aktual)            --}}
                    {{-- ========================================================== --}}
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
                                                
                                                <td class="p-4 font-bold text-gray-800">{{ $item->nama_barang }}</td>
                                                
                                                <td class="p-4 text-center">
                                                    <span class="bg-amber-50 text-amber-700 border border-amber-100 px-3 py-1.5 rounded-full text-xs font-bold shadow-sm">
                                                        {{ $item->jumlah }} {{ $item->satuan }}
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
                // Sembunyikan semua konten katalog
                document.querySelectorAll('.katalog-content').forEach(el => el.classList.remove('active'));
                
                // Reset tombol katalog
                document.querySelectorAll('.katalog-tab-btn').forEach(el => {
                    el.classList.remove('active-tab', 'bg-[var(--forest)]', 'text-white', 'border-[var(--forest)]');
                    el.classList.add('bg-white', 'text-gray-500', 'border-gray-300');
                });

                // Tampilkan yang dipilih
                document.getElementById(tabId).classList.add('active');
                
                // Warnai tombol yang dipilih
                btn.classList.add('active-tab', 'bg-[var(--forest)]', 'text-white', 'border-[var(--forest)]');
                btn.classList.remove('bg-white', 'text-gray-500', 'border-gray-300');
            }
        </script>

{{-- SCRIPT LOGIKA DINAMIS --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnAlat = document.getElementById('btn_alat');
    const btnBahan = document.getElementById('btn_bahan');
    const tipeLayanan = document.getElementById('tipe_layanan');
    const labelDaftar = document.getElementById('label_daftar');
    const selectInventaris = document.getElementById('pilih_inventaris');
    const btnTambah = document.getElementById('btn_tambah_barang');
    const tbodyTerpilih = document.getElementById('daftar_terpilih');
    const tabelContainer = document.getElementById('tabel_container');
    const pesanKosong = document.getElementById('pesan_kosong');

    function switchTab(jenis) {
        tbodyTerpilih.innerHTML = '';
        cekTabelKosong();

        if (jenis === 'Alat') {
            tipeLayanan.value = 'Peminjaman Alat';
            labelDaftar.innerText = 'Daftar Alat/Instrumen yang Dipinjam';
            
            btnAlat.className = 'px-6 py-2.5 rounded-xl text-sm font-bold border-2 transition-all duration-300 border-[#1a4a38] bg-[#1a4a38] text-white shadow-md';
            btnBahan.className = 'px-6 py-2.5 rounded-xl text-sm font-bold border-2 transition-all duration-300 border-gray-200 bg-white text-gray-500 hover:border-[#1a4a38] hover:text-[#1a4a38]';
            
            filterDropdown('Alat');
        } else {
            tipeLayanan.value = 'Pengambilan Bahan';
            labelDaftar.innerText = 'Daftar Bahan Kimia yang Diambil';
            
            btnBahan.className = 'px-6 py-2.5 rounded-xl text-sm font-bold border-2 transition-all duration-300 border-[#1a4a38] bg-[#1a4a38] text-white shadow-md';
            btnAlat.className = 'px-6 py-2.5 rounded-xl text-sm font-bold border-2 transition-all duration-300 border-gray-200 bg-white text-gray-500 hover:border-[#1a4a38] hover:text-[#1a4a38]';
            
            filterDropdown('Bahan');
        }
    }

    function filterDropdown(filterJenis) {
        selectInventaris.value = "";
        const options = selectInventaris.querySelectorAll('option');
        
        options.forEach(opt => {
            if (opt.value === "") return;

            const kat = opt.getAttribute('data-kategori');
            if (filterJenis === 'Alat') {
                if (kat === 'Alat' || kat === 'Instrumen Aset Lab') opt.style.display = 'block';
                else opt.style.display = 'none';
            } else {
                if (kat === 'Bahan') opt.style.display = 'block';
                else opt.style.display = 'none';
            }
        });
    }

    btnAlat.addEventListener('click', () => switchTab('Alat'));
    btnBahan.addEventListener('click', () => switchTab('Bahan'));

    btnTambah.addEventListener('click', function() {
        const selectedOpt = selectInventaris.options[selectInventaris.selectedIndex];
        
        if (!selectedOpt.value) {
            alert('Silakan pilih barang terlebih dahulu!');
            return;
        }

        const id = selectedOpt.value;
        const nama = selectedOpt.getAttribute('data-nama');
        const stok = parseInt(selectedOpt.getAttribute('data-stok'));
        const satuan = selectedOpt.getAttribute('data-satuan');

        if (document.getElementById('row_' + id)) {
            alert('Barang ini sudah ada di daftar permohonan Anda.');
            return;
        }

        const tr = document.createElement('tr');
        tr.id = 'row_' + id;
        tr.innerHTML = `
            <td class="p-3 font-medium text-gray-800">
                <input type="hidden" name="inventaris_id[]" value="${id}">
                ${nama}
            </td>
            <td class="p-3 text-center">
                <input type="number" name="jumlah_diminta[]" min="1" max="${stok}" value="1" class="w-16 p-1 border border-gray-300 rounded text-center focus:outline-none focus:border-[#1a4a38]" required>
            </td>
            <td class="p-3 text-center text-gray-500 text-xs uppercase">${satuan || '-'}</td>
            <td class="p-3 text-center">
                <button type="button" onclick="hapusBaris('${id}')" class="text-red-500 hover:text-red-700 font-bold p-1 rounded hover:bg-red-50 transition">X</button>
            </td>
        `;
        
        tbodyTerpilih.appendChild(tr);
        cekTabelKosong();
        selectInventaris.value = "";
    });

    window.hapusBaris = function(id) {
        const row = document.getElementById('row_' + id);
        if (row) row.remove();
        cekTabelKosong();
    }

    function cekTabelKosong() {
        if (tbodyTerpilih.children.length === 0) {
            tabelContainer.classList.add('hidden');
            pesanKosong.classList.remove('hidden');
        } else {
            tabelContainer.classList.remove('hidden');
            pesanKosong.classList.add('hidden');
        }
    }

    switchTab('Alat');
});
</script>
<script>
    // FUNGSI GANTI KATEGORI FORM
    function setKategoriForm(kategori, btn) {
        document.getElementById('kategori_form').value = kategori;
        
        // Reset warna tombol
        document.querySelectorAll('.btn-kategori-form').forEach(el => {
            el.classList.remove('bg-[var(--forest)]', 'text-white', 'border-[var(--forest)]');
            el.classList.add('bg-white', 'text-gray-500', 'border-gray-300');
        });
        
        // Aktifkan tombol yang diklik
        btn.classList.add('bg-[var(--forest)]', 'text-white', 'border-[var(--forest)]');
        btn.classList.remove('bg-white', 'text-gray-500', 'border-gray-300');

        // Kosongkan keranjang jika ganti form
        document.getElementById('daftar_keranjang').innerHTML = '<p id="keranjang_kosong" class="text-gray-400 italic text-sm text-center py-4">Pilih barang dengan menekan tombol "+ Pinjam" pada katalog di bawah.</p>';
    }

    // FUNGSI TAMBAH KE KERANJANG DARI KATALOG
    function tambahKeForm(id, nama, stokDatabase, kategoriItem) {
        const formKategori = document.getElementById('kategori_form').value;

        // Validasi: Tolak jika kategori silang (Misal: Form Alat, tapi klik Bahan)
        if (kategoriItem !== formKategori) {
            alert(`Peringatan: Anda sedang mengisi form [${formKategori}]. Anda tidak bisa memasukkan [${kategoriItem}] ke keranjang ini!`);
            return;
        }

        // Ekstrak angka murni dari stok (Misal: "15 Wadah" -> 15)
        const stokAktual = parseInt(stokDatabase) || 0;

        if (stokAktual <= 0) {
            alert(`Maaf, stok ${nama} sedang habis!`);
            return;
        }

        if (document.getElementById(`item-${id}`)) {
            alert(`${nama} sudah ada di keranjang Anda.`);
            return;
        }

        // Minta kuantitas yang ingin dipinjam
        let qty = prompt(`Berapa jumlah ${nama} yang ingin dipinjam? (Stok: ${stokDatabase})`, "1");
        qty = parseInt(qty);

        if (isNaN(qty) || qty <= 0) return;
        if (qty > stokAktual) {
            alert(`Jumlah melebihi stok yang tersedia!`);
            return;
        }

        // Sembunyikan teks "kosong"
        const txtKosong = document.getElementById('keranjang_kosong');
        if(txtKosong) txtKosong.remove();

        // Suntikkan data ke UI Form
        const html = `
            <div id="item-${id}" class="flex justify-between items-center bg-gray-50 p-3 rounded-lg border border-gray-200 shadow-sm animate-fade-in">
                <div>
                    <p class="font-bold text-sm text-gray-800">${nama}</p>
                    <input type="hidden" name="barang_id[]" value="${id}">
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-xs font-bold bg-white px-3 py-1.5 border border-gray-200 rounded text-emerald-700">Qty: ${qty}</span>
                    <input type="hidden" name="jumlah_pinjam[]" value="${qty}">
                    <button type="button" onclick="document.getElementById('item-${id}').remove()" class="text-red-400 hover:text-red-600 font-bold px-2">X</button>
                </div>
            </div>
        `;
        document.getElementById('daftar_keranjang').insertAdjacentHTML('beforeend', html);
    }
</script>
@endsection