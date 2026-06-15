@extends('layouts.admin.admin')

@section('title', 'Edit Data Inventaris')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Edit Data Inventaris</h1>
                <p class="text-gray-500">Perbarui informasi, sesuaikan stok masuk, dan kelola masa kedaluarsa bahan.</p>
            </div>
            <a href="{{ route('inventaris-lab.index') }}" class="bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 px-5 py-2.5 rounded-lg font-bold text-sm shadow-sm transition">
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden p-8">
            <form action="{{ route('inventaris-lab.update', $barang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kategori Barang <span class="text-red-500">*</span></label>
                        <select name="kategori" id="kategori" class="w-full md:w-1/2 border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-600 bg-gray-50 font-semibold" required onchange="toggleKedaluarsa()">
                            <option value="Alat" {{ $barang->kategori == 'Alat' ? 'selected' : '' }}>Alat</option>
                            <option value="Bahan" {{ $barang->kategori == 'Bahan' ? 'selected' : '' }}>Bahan</option>
                            <option value="Instrumen" {{ $barang->kategori == 'Instrumen' ? 'selected' : '' }}>Instrumen</option>
                            <option value="Instrumen Aset Lab" {{ $barang->kategori == 'Instrumen Aset Lab' ? 'selected' : '' }}>Instrumen Aset Lab</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Barang <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-600" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Stok Tersedia <span class="text-red-500">*</span></label>
                        <input type="text" name="jumlah" value="{{ old('jumlah', $barang->jumlah) }}" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-600" required>
                        <p class="text-[10px] text-gray-400 mt-1 font-medium italic">*Ubah angka ini jika ada penambahan stok baru (Contoh: 15 Wadah).</p>
                    </div>

                    <div id="form-kedaluarsa" class="{{ $barang->kategori == 'Bahan' ? 'block' : 'hidden' }}">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Kedaluarsa <span class="text-red-500">*</span></label>
                        <input type="date" name="kedaluarsa" id="input_kedaluarsa" value="{{ old('kedaluarsa', $barang->kedaluarsa) }}" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:border-blue-600">
                        <p class="text-[10px] text-gray-400 mt-1 font-medium italic">*Pilih batas aman penggunaan bahan kimia.</p>
                    </div>

                </div>

                <div class="mt-10 flex justify-end">
                    <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition transform hover:-translate-y-1 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Simpan Pembaruan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleKedaluarsa() {
        let kategori = document.getElementById('kategori').value;
        let formKedaluarsa = document.getElementById('form-kedaluarsa');
        let inputKedaluarsa = document.getElementById('input_kedaluarsa');
        
        if (kategori === 'Bahan') {
            formKedaluarsa.classList.remove('hidden');
            formKedaluarsa.classList.add('block');
        } else {
            formKedaluarsa.classList.remove('block');
            formKedaluarsa.classList.add('hidden');
            // Jika terganti menjadi alat, bersihkan isian formnya agar tidak ikut tersimpan
            inputKedaluarsa.value = ''; 
        }
    }
</script>
@endsection