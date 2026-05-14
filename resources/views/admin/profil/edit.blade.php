@extends('layouts.admin.admin')

@section('title', 'Kelola Data Profil & Struktur')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-5xl">
        
        <div class="mb-8">
            <a href="{{ route('profil.index') }}" class="text-blue-600 hover:underline flex items-center gap-2 mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar Profil
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Kelola Data Profil Program Studi</h1>
            <p class="text-gray-500 mt-2">Pisahkan pengelolaan teks informasi dan gambar bagan struktur organisasi.</p>
        </div>

        <div class="flex border-b border-gray-200 mb-6">
            <button onclick="switchTab('teks')" id="tab-teks" class="py-3 px-6 text-sm font-bold border-b-2 border-blue-600 text-blue-600 focus:outline-none transition-colors">
                1. Informasi Program Studi
            </button>
            <button onclick="switchTab('struktur')" id="tab-struktur" class="py-3 px-6 text-sm font-bold border-b-2 border-transparent text-gray-500 hover:text-gray-700 focus:outline-none transition-colors">
                2. Bagan Struktur Organisasi
            </button>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
            
            <form action="{{ route('profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                
                <div id="konten-teks" class="block space-y-6">
                    <div class="bg-blue-50 p-4 rounded-lg mb-4 border border-blue-100">
                        <p class="text-sm text-blue-800 font-semibold">Bagian ini mengelola teks Visi, Misi, Sejarah, dan Prospek Karir.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Sejarah Singkat</label>
                        <textarea name="sejarah" rows="5" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $profil->sejarah }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Visi</label>
                            <textarea name="visi" rows="4" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $profil->visi }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Misi</label>
                            <textarea name="misi" rows="4" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $profil->misi }}</textarea>
                        </div>
                    </div>

                    <div class="hidden"> <label class="block text-sm font-bold text-gray-700 mb-2">Tujuan</label>
                        <textarea name="tujuan" rows="2" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg">{{ $profil->tujuan ?? '-' }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Prospek Karir</label>
                        <textarea name="prospek_karir" rows="4" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $profil->prospek_karir }}</textarea>
                    </div>
                </div>

                <div id="konten-struktur" class="hidden space-y-6">
                    <div class="bg-green-50 p-4 rounded-lg mb-4 border border-green-100">
                        <p class="text-sm text-green-800 font-semibold">Bagian ini khusus mengelola gambar bagan struktur organisasi.</p>
                    </div>

                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center">
                        @if($profil->struktur_organisasi)
                            <div class="mb-6">
                                <p class="text-sm text-gray-500 mb-3 font-semibold">Bagan Saat Ini:</p>
                                <img src="{{ asset($profil->struktur_organisasi) }}" class="max-w-full h-auto max-h-96 mx-auto rounded border shadow-sm">
                            </div>
                        @else
                            <div class="mb-6 py-10 bg-gray-50 rounded-lg">
                                <svg class="w-16 h-16 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class="text-gray-500 text-sm">Belum ada bagan struktur yang diunggah</p>
                            </div>
                        @endif

                        <div class="w-full max-w-md mx-auto">
                            <label class="block text-sm font-bold text-gray-700 mb-2 text-left">Unggah/Ganti Gambar Bagan Baru</label>
                            <input type="file" name="struktur_organisasi" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer border border-gray-200 rounded-md">
                            <p class="text-xs text-gray-400 mt-2 text-left">Format: JPG, PNG, JPEG. Maksimal 2MB.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-10 pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition transform hover:-translate-y-0.5">
                        Simpan Semua Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    function switchTab(tab) {
        // Sembunyikan semua konten
        document.getElementById('konten-teks').classList.add('hidden');
        document.getElementById('konten-struktur').classList.add('hidden');
        
        // Reset warna tab
        document.getElementById('tab-teks').classList.remove('border-blue-600', 'text-blue-600');
        document.getElementById('tab-teks').classList.add('border-transparent', 'text-gray-500');
        
        document.getElementById('tab-struktur').classList.remove('border-blue-600', 'text-blue-600');
        document.getElementById('tab-struktur').classList.add('border-transparent', 'text-gray-500');

        // Tampilkan yang aktif
        document.getElementById('konten-' + tab).classList.remove('hidden');
        document.getElementById('tab-' + tab).classList.add('border-blue-600', 'text-blue-600');
        document.getElementById('tab-' + tab).classList.remove('border-transparent', 'text-gray-500');
    }
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Cari semua elemen yang punya class 'ckeditor-field'
        let editors = document.querySelectorAll('.ckeditor-field');
        
        // Loop dan ubah satu per satu menjadi editor
        editors.forEach(function(editorElement) {
            ClassicEditor
                .create(editorElement, {
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ]
                })
                .catch(error => {
                    console.error(error);
                });
        });
    });
</script>

<style>
    /* Mengatur tinggi minimal editor agar lebih nyaman digunakan mengetik */
    .ck-editor__editable_inline {
        min-height: 250px;
    }
    /* Memperbaiki tampilan border agar menyatu dengan desain Tailwind Anda */
    .ck-editor__main .ck-content {
        border-radius: 0 0 0.5rem 0.5rem !important;
        border-color: #d1d5db !important;
    }
    .ck-toolbar {
        border-radius: 0.5rem 0.5rem 0 0 !important;
        background-color: #f9fafb !important;
        border-color: #d1d5db !important;
    }
</style>

@endsection