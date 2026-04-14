@extends('layouts.main')

@section('title', 'Form Peminjaman Alat')

@section('content')

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div class="container mx-auto px-6 py-12 max-w-5xl">
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">
        <div class="bg-[#1a4a38] p-8 text-white text-center">
            <h2 class="text-2xl font-bold uppercase">Bon Peminjaman Alat</h2>
            <p class="text-green-100 mt-1 italic">Program Studi Teknik Bioproses / Bioteknologi - Institut Teknologi Del</p>
        </div>

        <form action="{{ route('lab.pinjam.store') }}" method="POST" class="p-8">
            @csrf
            <input type="hidden" name="jenis_form" value="Alat">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">1. Judul Penelitian</label>
                        <input type="text" name="judul_penelitian" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">2. Laboratorium yang Digunakan</label>
                        <select name="laboratorium" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500" required>
                            <option value="">-- Pilih Laboratorium --</option>
                            <option value="Lab Biologi Dasar">Lab Biologi Dasar</option>
                            <option value="Lab Mikrobiologi">Lab Mikrobiologi</option>
                            <option value="Lab Kimia Dasar">Lab Kimia Dasar</option>
                        </select>
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">3. Nama Peminjam / NIM</label>
                        <div class="flex gap-2">
                            <input type="text" name="nama_peminjam" placeholder="Nama Lengkap" class="w-2/3 border-gray-300 rounded-lg shadow-sm" required>
                            <input type="text" name="nim" placeholder="NIM" class="w-1/3 border-gray-300 rounded-lg shadow-sm" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">4. Prodi / Instansi</label>
                        <input type="text" name="prodi" value="Teknik Bioteknologi" class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>
                </div>
            </div>

            <div class="mb-8" x-data="{ items: [{ nama: '', jumlah: '', ukuran: '', ket_sebelum: '' }] }">
                <label class="block text-sm font-bold text-gray-700 mb-4">5. Daftar Alat yang Dipinjam :</label>
                
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-200 rounded-lg">
                        <thead class="bg-gray-50 text-gray-700 text-xs uppercase">
                            <tr>
                                <th class="border p-3 text-left">Nama Alat</th>
                                <th class="border p-3 w-20">Jumlah</th>
                                <th class="border p-3 w-32">Ukuran</th>
                                <th class="border p-3">Ket. Sebelum</th>
                                <th class="border p-3 w-16 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="(item, index) in items" :key="index">
                                <tr>
                                    <td class="border p-2">
                                        <input type="text" x-model="item.nama" :name="'items['+index+'][nama]'" required class="w-full border-0 focus:ring-0 text-sm">
                                    </td>
                                    <td class="border p-2">
                                        <input type="number" x-model="item.jumlah" :name="'items['+index+'][jumlah]'" required class="w-full border-0 focus:ring-0 text-sm text-center">
                                    </td>
                                    <td class="border p-2">
                                        <input type="text" x-model="item.ukuran" :name="'items['+index+'][ukuran]'" class="w-full border-0 focus:ring-0 text-sm">
                                    </td>
                                    <td class="border p-2">
                                        <input type="text" x-model="item.ket_sebelum" :name="'items['+index+'][ket_sebelum]'" class="w-full border-0 focus:ring-0 text-sm">
                                    </td>
                                    <td class="border p-2 text-center">
                                        <button type="button" @click="items.splice(index, 1)" x-show="items.length > 1" class="text-red-500 hover:text-red-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <button type="button" @click="items.push({ nama: '', jumlah: '', ukuran: '', ket_sebelum: '' })" class="mt-4 flex items-center gap-2 text-sm text-green-600 font-bold hover:text-green-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Tambah Alat Lagi
                </button>
            </div>

            <div class="flex justify-end pt-6 border-t border-gray-100">
                <button type="submit" class="bg-[#1a4a38] text-white px-10 py-3 rounded-xl font-bold shadow-lg hover:bg-green-800 transition transform hover:-translate-y-1">
                    Kirim Permohonan Pinjam
                </button>
            </div>
        </form>
    </div>
</div>
@endsection