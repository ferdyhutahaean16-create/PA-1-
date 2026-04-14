@extends('layouts.admin.admin')

@section('title', 'Tambah Laboratorium')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Tambah Laboratorium</h1>
                <p class="text-gray-500">Masukkan data fasilitas dan foto ruangan lab baru.</p>
            </div>
            <a href="{{ route('laboratorium.index') }}" class="text-gray-500 hover:text-gray-800 font-bold flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <form action="{{ route('laboratorium.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf

                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Laboratorium <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_lab" placeholder="Contoh: Lab Biologi Dasar" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Kepala Laboratorium</label>
                            <input type="text" name="kepala_lab" placeholder="Nama Dosen/Kepala Lab" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Fasilitas Utama</label>
                        <input type="text" name="fasilitas" placeholder="Contoh: Mikroskop, Inkubator, dll" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Ruangan</label>
                        <textarea name="deskripsi" rows="4" placeholder="Jelaskan fungsi dan kegiatan di lab ini..." class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]"></textarea>
                    </div>

                    <div class="pt-6 border-t border-gray-100">
                        <label class="block text-sm font-bold text-gray-700 mb-4">Upload Foto Ruangan (Opsional)</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="border border-gray-200 p-4 rounded-lg bg-gray-50">
                                <label class="text-xs font-bold text-gray-500 mb-1 block">Foto Utama</label>
                                <input type="file" name="foto" accept="image/*" class="w-full text-sm">
                            </div>
                            <div class="border border-gray-200 p-4 rounded-lg bg-gray-50">
                                <label class="text-xs font-bold text-gray-500 mb-1 block">Foto Pendukung 1</label>
                                <input type="file" name="foto_2" accept="image/*" class="w-full text-sm">
                            </div>
                            <div class="border border-gray-200 p-4 rounded-lg bg-gray-50">
                                <label class="text-xs font-bold text-gray-500 mb-1 block">Foto Pendukung 2</label>
                                <input type="file" name="foto_3" accept="image/*" class="w-full text-sm">
                            </div>
                            <div class="border border-gray-200 p-4 rounded-lg bg-gray-50">
                                <label class="text-xs font-bold text-gray-500 mb-1 block">Foto Pendukung 3</label>
                                <input type="file" name="foto_4" accept="image/*" class="w-full text-sm">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="bg-[#1a4a38] text-white px-8 py-3 rounded-lg font-bold shadow hover:bg-green-800 transition">Simpan Laboratorium</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection