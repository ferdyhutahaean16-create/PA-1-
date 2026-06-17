@extends('layouts.admin.admin')

@section('title', 'Tambah Inventaris Lab')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        
        <div class="mb-8">
            <a href="{{ route('inventories.index') }}" class="text-blue-600 hover:underline flex items-center gap-2 mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Tambah Data Inventaris Laboratorium</h1>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-yellow-500">
            
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
                    <strong class="font-bold">Gagal Menyimpan!</strong> Periksa form di bawah.
                </div>
            @endif

            <form action="{{ route('inventories.store') }}" method="POST" class="space-y-6">
                @csrf
                
                {{-- BAGIAN UTAMA --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                    <select name="category" id="pilih_kategori" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                        <option value="">-- Pilih Kategori Inventaris --</option>
                        {{-- Value diubah menyesuaikan Enum di database --}}
                        <option value="Equipment" {{ old('category') == 'Equipment' ? 'selected' : '' }}>Alat Gelas / Laboratorium</option>
                        <option value="Material" {{ old('category') == 'Material' ? 'selected' : '' }}>Bahan / Bahan Kimia</option>
                        <option value="Instrument" {{ old('category') == 'Instrument' ? 'selected' : '' }}>Instrumen Aset Lab</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Barang / Bahan <span class="text-red-500">*</span></label>
                        <input type="text" name="item_name" value="{{ old('item_name') }}" class="form-control w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="Nama Barang" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah / Stok <span class="text-gray-400 font-normal">(Opsional)</span></label>
                        {{-- Diubah menjadi input angka karena di database tipenya integer --}}
                        <input type="number" name="quantity" value="{{ old('quantity') }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500/50 outline-none transition" placeholder="Contoh: 1">
                    </div>
                </div>

                {{-- FORM KHUSUS ALAT (EQUIPMENT) --}}
                <div id="form_alat" class="hidden p-5 bg-blue-50 rounded-xl border border-blue-100 space-y-4 mt-4">
                    <h4 class="font-bold text-blue-800 text-sm uppercase tracking-wider mb-2">Detail Alat Laboratorium</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tahun</label>
                            <input type="text" name="year" value="{{ old('year') }}" placeholder="Contoh: 2023" class="w-full p-3 border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Penyimpanan</label>
                            <input type="text" name="storage" value="{{ old('storage') }}" placeholder="Contoh: Lemari Kaca A" class="w-full p-3 border border-gray-300 rounded-lg">
                        </div>
                    </div>
                </div>

                {{-- FORM KHUSUS BAHAN (MATERIAL) --}}
                <div id="form_bahan" class="hidden p-5 bg-emerald-50 rounded-xl border border-emerald-100 space-y-4 mt-4">
                    <h4 class="font-bold text-emerald-800 text-sm uppercase tracking-wider mb-2">Detail Bahan Kimia</h4>
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Rumus Kimia</label>
                        <input type="text" name="chemical_formula" value="{{ old('chemical_formula') }}" class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Letak (Lemari)</label>
                            <input type="text" name="cupboard_location" value="{{ old('cupboard_location') }}" class="w-full p-3 border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Letak (Lab/GD)</label>
                            <input type="text" name="lab_location" value="{{ old('lab_location') }}" class="w-full p-3 border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Berat Kotor</label>
                            <input type="text" name="gross_weight" value="{{ old('gross_weight') }}" placeholder="Contoh: 500g" class="w-full p-3 border border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Berat Bersih</label>
                            <input type="text" name="net_weight" value="{{ old('net_weight') }}" placeholder="Contoh: 480g" class="w-full p-3 border border-gray-300 rounded-lg">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Kadaluarsa</label>
                        <input type="date" name="expiry_date" value="{{ old('expiry_date') }}" class="w-full p-3 border border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Keterangan Tambahan</label>
                        <textarea name="description" rows="2" class="w-full p-3 border border-gray-300 rounded-lg">{{ old('description') }}</textarea>
                    </div>
                </div>

                {{-- FORM KHUSUS INSTRUMEN (INSTRUMENT) --}}
                <div id="form_instrumen" class="hidden p-5 bg-purple-50 rounded-xl border border-purple-100 space-y-4 mt-4">
                    <h4 class="text-sm font-bold text-purple-800 mb-5 uppercase tracking-widest">Detail Instrumen Aset</h4>
            
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kode Barang</label>
                            <input type="text" name="item_code" value="{{ old('item_code') }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500/50 outline-none transition" placeholder="Contoh: III.D1.01.410...">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Satuan <span class="text-gray-400 font-normal">(Kosongkan jika Unit/Set)</span></label>
                            <input type="text" name="unit" value="{{ old('unit') }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500/50 outline-none transition" placeholder="Contoh: ml, gr, botol">
                        </div>

                        {{-- Saya hapus letak_lab di sini karena sudah ada di form bahan. HTML akan bermasalah jika ada 2 input dengan name yang sama dalam satu form. --}}

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Harga <span class="text-gray-400 font-normal">(Opsional)</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-gray-500 font-medium">Rp</span>
                                </div>
                                <input type="number" name="price" value="{{ old('price') }}" class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500/50 outline-none transition" placeholder="15000000">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition">
                        Simpan Inventaris
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- SCRIPT UNTUK MEMBUAT FORM DINAMIS --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownKategori = document.getElementById('pilih_kategori');
        const formAlat = document.getElementById('form_alat');
        const formBahan = document.getElementById('form_bahan');
        const formInstrumen = document.getElementById('form_instrumen');

        // Fungsi untuk mengecek form mana yang harus tampil
        function toggleForms() {
            formAlat.classList.add('hidden');
            formBahan.classList.add('hidden');
            formInstrumen.classList.add('hidden');

            // Sesuaikan dengan value Enum bahasa Inggris
            if (dropdownKategori.value === 'Equipment') {
                formAlat.classList.remove('hidden');
            } else if (dropdownKategori.value === 'Material') {
                formBahan.classList.remove('hidden');
            } else if (dropdownKategori.value === 'Instrument') {
                formInstrumen.classList.remove('hidden');
            }
        }

        // Jalankan saat dropdown berubah
        dropdownKategori.addEventListener('change', toggleForms);
        
        // Jalankan sekali saat halaman dimuat (berguna jika ada error validasi dan old('category') terisi)
        if(dropdownKategori.value !== '') {
            toggleForms();
        }
    });
</script>
@endsection