@extends('layouts.admin.admin')

@section('title', 'Tambah Kegiatan')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8">
            <a href="{{ route('kegiatan.index') }}" class="text-blue-600 hover:underline flex items-center gap-2 mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Tambah Data Kegiatan</h1>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-green-600">
            
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
                    <strong class="font-bold">Gagal Menyimpan!</strong> Silakan perbaiki:
                    <ul class="list-disc ml-5 mt-2 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kategori Kegiatan <span class="text-red-500">*</span></label>
                    <select name="kategori" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Pengabdian Dosen">Pengabdian Masyarakat (PKM) Dosen</option>
                        <option value="PkM Mahasiswa">PkM Mahasiswa</option>
                        <option value="Himpunan">Himpunan Mahasiswa (HIMABIO)</option>
                        <option value="Kaderisasi">Kaderisasi</option>
                        <option value="Penelitian">Penelitian (Riset)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Judul/Nama Kegiatan <span class="text-red-500">*</span></label>
                    <input type="text" name="judul" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500" placeholder="Contoh: Sosialisasi Pupuk Organik di Desa X" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pelaksana (Ketua Tim / Organisasi) <span class="text-red-500">*</span></label>
                        <input type="text" name="pelaksana" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500" placeholder="Contoh: Bpk. Budi Santoso / HIMA Biotek" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Waktu Pelaksanaan <span class="text-red-500">*</span></label>
                        <input type="text" name="waktu_pelaksanaan" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500" placeholder="Contoh: 12 Agustus 2024" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tempat/Lokasi (Opsional)</label>
                    <input type="text" name="tempat" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500" placeholder="Contoh: Aula Desa Laguboti">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Kegiatan (Opsional)</label>
                    <textarea name="deskripsi" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500" placeholder="Ceritakan singkat tentang kegiatan ini..."></textarea>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Upload Foto Dokumentasi (Opsional)</label>
                    <input type="file" name="foto" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 border border-gray-300 rounded-lg bg-white cursor-pointer">
                    <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG. Maksimal 2MB. Gunakan orientasi lanskap (melebar) agar lebih bagus.</p>
                </div>

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition">
                        Simpan Data Kegiatan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection