@extends('layouts.admin.admin')

@section('title', 'Edit Mitra Kerja Sama')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Edit Data Mitra</h1>
                <p class="text-gray-500">Perbarui informasi kerja sama dengan {{ $cooperation->partner_name }}.</p>
            </div>
            <a href="{{ route('cooperation.index') }}" class="text-gray-500 hover:text-gray-800 font-bold flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <form action="{{ route('cooperation.update', $cooperation->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Instansi / Mitra <span class="text-red-500">*</span></label>
                            <input type="text" name="partner_name" value="{{ $cooperation->partner_name }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tipe Mitra <span class="text-red-500">*</span></label>
                            <select name="type" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                                <option value="Industri" {{ $cooperation->type == 'Industri' ? 'selected' : '' }}>Industri / Perusahaan</option>
                                <option value="Pendidikan" {{ $cooperation->type == 'Pendidikan' ? 'selected' : '' }}>Pendidikan / Universitas</option>
                                <option value="Pemerintah" {{ $cooperation->type == 'Pemerintah' ? 'selected' : '' }}>Pemerintahan / Lembaga</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Mulai <span class="text-red-500">*</span></label>
                            <input type="date" name="start_date" value="{{ $cooperation->start_date }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Berakhir (Kosongkan jika berlanjut)</label>
                            <input type="date" name="end_date" value="{{ $cooperation->end_date }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Ganti Dokumen MoU / Perjanjian</label>
                        @if($cooperation->document_file)
                            <div class="mb-2 text-sm text-gray-600">
                                Dokumen saat ini: <a href="{{ asset($cooperation->document_file) }}" target="_blank" class="text-blue-600 underline font-bold">Lihat Dokumen</a>
                            </div>
                        @endif
                        <input type="file" name="document_file" accept=".pdf,.doc,.docx,.jpg,.png" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-[#1a4a38]">
                        <p class="text-xs text-gray-400 mt-1">Biarkan kosong jika tidak ingin mengganti dokumen.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Ganti Logo Mitra</label>
                        @if($cooperation->logo)
                            <img src="{{ asset($cooperation->logo) }}" class="h-12 mb-2 object-contain">
                        @endif
                        <input type="file" name="logo" accept="image/*" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-[#1a4a38]">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Singkat Kerja Sama</label>
                        <textarea name="description" rows="3" class="ckeditor-field w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]">{{ $cooperation->description }}</textarea>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="bg-yellow-500 text-white px-8 py-3 rounded-lg font-bold shadow hover:bg-yellow-600 transition">Update Mitra</button>
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