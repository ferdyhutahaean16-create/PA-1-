@extends('layouts.admin.admin')

@section('title', 'Edit Kegiatan')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8">
            <a href="{{ route('kegiatan.index') }}" class="text-blue-600 hover:underline flex items-center gap-2 mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Batal
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Edit Data Kegiatan</h1>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-yellow-500">
            
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
                    <strong class="font-bold">Gagal Update!</strong> Periksa form di bawah.
                </div>
            @endif

            <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf @method('PUT')
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kategori Kegiatan <span class="text-red-500">*</span></label>
                    <select name="kategori" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Pengabdian Dosen" {{ $kegiatan->kategori == 'Pengabdian Dosen' ? 'selected' : '' }}>Pengabdian Masyarakat (PKM) Dosen</option>
                        <option value="PkM Mahasiswa" {{ $kegiatan->kategori == 'PkM Mahasiswa' ? 'selected' : '' }}>PkM Mahasiswa</option>
                        <option value="Himpunan" {{ $kegiatan->kategori == 'Himpunan' ? 'selected' : '' }}>Himpunan Mahasiswa (HIMABIO)</option>
                        <option value="Kaderisasi" {{ $kegiatan->kategori == 'Kaderisasi' ? 'selected' : '' }}>Kaderisasi</option>
                        <option value="Penelitian" {{ $kegiatan->kategori == 'Penelitian' ? 'selected' : '' }}>Penelitian (Riset)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Judul/Nama Kegiatan <span class="text-red-500">*</span></label>
                    <input type="text" name="judul" value="{{ $kegiatan->judul }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pelaksana <span class="text-red-500">*</span></label>
                        <input type="text" name="pelaksana" value="{{ old('pelaksana', $kegiatan->pelaksana ?? '') }}" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Waktu Pelaksanaan <span class="text-red-500">*</span></label>
                        <input type="text" name="waktu_pelaksanaan" value="{{ $kegiatan->waktu_pelaksanaan }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tempat/Lokasi</label>
                    <input type="text" name="tempat" value="{{ $kegiatan->tempat }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Kegiatan</label>
                    <textarea name="deskripsi" rows="4" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">{{ $kegiatan->deskripsi }}</textarea>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <label class="block text-sm font-bold text-gray-700 mb-4">Media Foto</label>
                    @if($kegiatan->foto)
                        <div class="mb-4">
                            <img src="{{ asset($kegiatan->foto) }}" class="h-32 rounded-lg border shadow-sm object-cover">
                        </div>
                    @endif
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ganti Foto (Opsional)</label>
                    <input type="file" name="foto" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100 border border-gray-300 rounded-lg bg-white cursor-pointer">
                </div>

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition">
                        Update Data Kegiatan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Cari semua elemen yang punya class 'ckeditor-field'
        let editors = document.querySelectorAll('.ckeditor-field');
        
        // Loop dan ubah satu per satu menjadi editor
        editors.forEach(function(editorElement) {
            ClassicEditor
                .create(editorElement, {
                    // Opsional: Anda bisa mengatur menu toolbar di sini
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ]
                })
                .catch(error => {
                    console.error(error);
                });
        });
    });
</script>

<style>
    /* Sedikit perbaikan CSS agar editornya tidak terlalu pendek */
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
@endsection