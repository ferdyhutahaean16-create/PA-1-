@extends('layouts.admin.admin')

@section('title', 'Tambah Testimoni')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Tambah Testimoni</h1>
                <p class="text-gray-500">Berikan inspirasi bagi calon mahasiswa melalui kisah alumni.</p>
            </div>
            <a href="{{ route('testimoni.index') }}" class="text-gray-500 hover:text-gray-800 font-bold flex items-center gap-2 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Alumni <span class="text-red-500">*</span></label>
                        <input type="text" name="name" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Angkatan (Tahun Lulus) <span class="text-red-500">*</span></label>
                        <input type="number" name="graduation_year" placeholder="Contoh: 2022" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pekerjaan / Jabatan Saat Ini</label>
                        <input type="text" name="position" placeholder="Contoh: Senior Researcher" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Instansi / Perusahaan</label>
                        <input type="text" name="workplace" placeholder="Contoh: PT. Kimia Farma" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Foto Profil</label>
                    <input type="file" name="photo" accept="image/*" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:ring-[#1a4a38]">
                    <p class="text-xs text-gray-400 mt-1 italic">Format: JPG, PNG. Maksimal 2MB.</p>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Isi Testimoni <span class="text-red-500">*</span></label>
                    <textarea name="testimony" rows="5" class="ckeditor-field w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required placeholder="Ceritakan pengalaman selama kuliah di Bioteknologi IT Del..."></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-[#1a4a38] text-white px-8 py-3 rounded-lg font-bold shadow-md hover:bg-green-800 transition">Simpan Testimoni</button>
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