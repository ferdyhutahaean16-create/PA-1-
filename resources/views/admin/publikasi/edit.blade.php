@extends('layouts.admin.admin')

@section('title', 'Edit Publikasi')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8">
            <a href="{{ route('publikasi.index') }}" class="text-blue-600 hover:underline flex items-center gap-2 mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Batal & Kembali
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Edit Data Publikasi</h1>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-yellow-500">
            <form action="{{ route('publikasi.update', $publikasi->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf 
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select name="kategori" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                            <option value="Mahasiswa" {{ $publikasi->kategori == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                            <option value="Dosen" {{ $publikasi->kategori == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Bulan & Tahun <span class="text-red-500">*</span></label>
                        <input type="text" name="tanggal_publikasi" value="{{ $publikasi->tanggal_publikasi }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Judul Publikasi <span class="text-red-500">*</span></label>
                    <input type="text" name="judul" value="{{ $publikasi->judul }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Penulis <span class="text-red-500">*</span></label>
                        <input type="text" name="penulis" value="{{ $publikasi->penulis }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tipe Publikasi</label>
                        <input type="text" name="tipe_publikasi" value="{{ $publikasi->tipe_publikasi }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Link Download PDF (Url)</label>
                        <input type="url" name="link_download" value="{{ $publikasi->link_download }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Link Website Jurnal (Url)</label>
                        <input type="url" name="link_view" value="{{ $publikasi->link_view }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Abstrak / Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">{{ $publikasi->deskripsi }}</textarea>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <label class="block text-sm font-bold text-gray-700 mb-4">Cover Jurnal/Artikel</label>
                    
                    @if($publikasi->gambar)
                        <div class="mb-4">
                            <p class="text-xs text-gray-500 mb-2">Cover Saat Ini:</p>
                            <img src="{{ asset($publikasi->gambar) }}" class="h-32 w-auto object-cover rounded border shadow-sm">
                        </div>
                    @endif
                    
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ganti Cover (Opsional)</label>
                    <input type="file" name="gambar" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100 border border-gray-300 rounded-lg bg-white cursor-pointer">
                </div>

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition">
                        Update Publikasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection