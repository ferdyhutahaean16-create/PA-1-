@extends('layouts.main')

@section('title', 'Form Peminjaman & Pengambilan')

@section('content')
<div class="py-12 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 max-w-3xl">
        
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 md:p-12">
            <h2 class="text-3xl font-bold text-[#1a4a38] mb-2 text-center">Formulir Layanan Lab</h2>
            <p class="text-gray-500 text-center mb-8">Pilih jenis layanan dan lengkapi data permohonan Anda.</p>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6 text-center font-bold">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('laboratorium.store') }}" method="POST" x-data="{ jenisForm: 'Alat', items: [{ nama: '', jumlah: 1, ukuran: '' }] }">
                @csrf

                <div class="mb-8 flex gap-4 justify-center">
                    <label class="cursor-pointer">
                        <input type="radio" name="jenis_form" value="Alat" x-model="jenisForm" class="peer sr-only">
                        <div class="px-6 py-3 rounded-xl border-2 peer-checked:border-[#1a4a38] peer-checked:bg-green-50 font-bold text-gray-400 peer-checked:text-[#1a4a38] transition-all">
                            Peminjaman Alat
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="jenis_form" value="Bahan" x-model="jenisForm" class="peer sr-only">
                        <div class="px-6 py-3 rounded-xl border-2 peer-checked:border-purple-600 peer-checked:bg-purple-50 font-bold text-gray-400 peer-checked:text-purple-700 transition-all">
                            Pengambilan Bahan
                        </div>
                    </label>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Peminjam</label>
                        <input type="text" name="nama_peminjam" required class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#1a4a38] outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">NIM</label>
                        <input type="text" name="nim" required class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#1a4a38] outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Program Studi</label>
                        <input type="text" name="prodi" required value="Bioteknologi" readonly class="w-full px-4 py-3 rounded-lg bg-gray-100 border border-gray-200 text-gray-500 cursor-not-allowed outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Ruang Lab Tujuan</label>
                        <input type="text" name="laboratorium" required placeholder="Contoh: Lab Mikrobiologi" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#1a4a38] outline-none">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Judul Penelitian / Praktikum</label>
                        <input type="text" name="judul_penelitian" required class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#1a4a38] outline-none">
                    </div>
                </div>

                <div class="mb-8 p-6 bg-gray-50 rounded-xl border border-gray-200">
                    <h3 class="font-bold text-gray-800 mb-4" x-text="jenisForm === 'Alat' ? 'Daftar Alat yang Dipinjam' : 'Daftar Bahan yang Diambil'"></h3>
                    
                    <template x-for="(item, index) in items" :key="index">
                        <div class="flex gap-4 mb-4 items-end">
                            <div class="flex-1">
                                <label class="block text-xs font-bold text-gray-500 mb-1" x-text="jenisForm === 'Alat' ? 'Nama Alat' : 'Nama Bahan'"></label>
                                <input type="text" x-model="item.nama" :name="`items[${index}][nama]`" required class="w-full px-3 py-2 rounded-md border border-gray-300 outline-none">
                            </div>
                            <div class="w-24">
                                <label class="block text-xs font-bold text-gray-500 mb-1">Jumlah</label>
                                <input type="number" x-model="item.jumlah" :name="`items[${index}][jumlah]`" required min="1" class="w-full px-3 py-2 rounded-md border border-gray-300 outline-none text-center">
                            </div>
                            
                            <div class="w-32" x-show="jenisForm === 'Alat'">
                                <label class="block text-xs font-bold text-gray-500 mb-1">Ukuran</label>
                                <input type="text" x-model="item.ukuran" :name="`items[${index}][ukuran]`" placeholder="opsional" class="w-full px-3 py-2 rounded-md border border-gray-300 outline-none">
                            </div>

                            <button type="button" @click="items.splice(index, 1)" x-show="items.length > 1" class="bg-red-100 text-red-600 p-2.5 rounded-md hover:bg-red-200 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </template>

                    <button type="button" @click="items.push({ nama: '', jumlah: 1, ukuran: '' })" class="text-sm font-bold text-[#1a4a38] flex items-center gap-1 hover:underline mt-2">
                        + Tambah Baris Lagi
                    </button>
                </div>

                <button type="submit" class="w-full bg-[#1a4a38] text-white font-bold py-4 rounded-xl shadow-lg hover:bg-green-900 transition-all active:scale-[0.98]">
                    Kirim Permohonan Lab
                </button>

            </form>
        </div>
    </div>
</div>
@endsection