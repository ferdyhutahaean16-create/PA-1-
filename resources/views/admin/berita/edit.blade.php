@extends('layouts.admin.admin')

@section('title', 'Edit Berita')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Edit Berita</h1>
                <p class="text-gray-500">Perbarui informasi artikel yang sudah diterbitkan.</p>
            </div>
            <a href="{{ route('berita.index') }}" class="text-gray-500 hover:text-gray-800 font-bold flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Judul Berita <span class="text-red-500">*</span></label>
                        <input type="text" name="judul" value="{{ $berita->judul }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Publikasi <span class="text-red-500">*</span></label>
                            <input type="date" name="tanggal" value="{{ $berita->tanggal }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Ganti Foto (Opsional)</label>
                            <div class="flex items-center gap-4">
                                @if($berita->foto)
                                    <img src="{{ asset($berita->foto) }}" class="w-16 h-16 object-cover rounded shadow-sm border border-gray-200">
                                @endif
                                <div class="flex-1">
                                    <input type="file" name="foto" accept="image/*" class="w-full border border-gray-300 rounded-lg p-1.5 text-sm">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Isi Berita <span class="text-red-500">*</span></label>
                        <textarea name="konten" rows="10" class="ckeditor-field w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>{{ $berita->konten }}</textarea>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="bg-yellow-500 text-white px-8 py-3 rounded-lg font-bold shadow hover:bg-yellow-600 transition">Update Berita</button>
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