@extends('layouts.admin.admin')

@section('title', 'Tambah Mitra Kerja Sama')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Tambah Mitra Baru</h1>
                <p class="text-gray-500">Masukkan data instansi yang menjalin kerja sama.</p>
            </div>
            <a href="{{ route('cooperation.index') }}" class="text-emerald-600 hover:text-emerald-500 font-bold flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <form action="{{ route('cooperation.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf

                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Instansi / Mitra <span class="text-red-500">*</span></label>
                            <input type="text" name="partner_name" placeholder="Contoh: PT. Bio Farma" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tipe Mitra <span class="text-red-500">*</span></label>
                            <select name="type" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                                <option value="">-- Pilih Tipe --</option>
                                <option value="Industri">Industri / Perusahaan</option>
                                <option value="Pendidikan">Pendidikan / Universitas</option>
                                <option value="Pemerintah">Pemerintahan / Lembaga</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Mulai <span class="text-red-500">*</span></label>
                            <input type="date" name="start_date" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Berakhir (Kosongkan jika berlanjut)</label>
                            <input type="date" name="end_date" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Unggah Dokumen MoU / Perjanjian (Opsional)</label>
                        <input type="file" name="document_file" accept=".pdf,.doc,.docx,.jpg,.png" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-[#1a4a38]">
                        <p class="text-xs text-gray-400 mt-1">Format: PDF, Word, JPG, PNG. Maksimal 5MB.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Logo Mitra</label>
                        <input type="file" name="logo" accept="image/*" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-[#1a4a38]">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Singkat Kerja Sama</label>
                        <textarea name="description" rows="3" placeholder="Fokus pada penelitian bersama, magang mahasiswa, dll..." class="ckeditor-field w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]"></textarea>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="bg-emerald-600 text-white px-8 py-3 rounded-lg font-bold shadow hover:bg-emerald-500 transition">
                        Simpan
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