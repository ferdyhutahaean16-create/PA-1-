@extends('layouts.admin.admin')

@section('title', 'Tambah Prestasi')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8">
            <a href="{{ route('prestasi.index') }}" class="text-blue-600 hover:underline flex items-center gap-2 mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Tambah Data Prestasi</h1>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-blue-500">
            <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select name="kategori" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Dosen">Dosen</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tahun Perolehan <span class="text-red-500">*</span></label>
                        <input type="number" name="tahun" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Contoh: {{ date('Y') }}" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Peraih Prestasi (Individu / Tim) <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_peraih" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Budi Santoso (Atau: Tim Robotik Biotek)" required>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pihak Penyelenggara</label>
                    <input type="text" name="penyelenggara" 
                           value="{{ old('penyelenggara', $prestasi->penyelenggara ?? '') }}" 
                           placeholder="Contoh: Kemendikbudristek, LIPI, atau Universitas Gadjah Mada"
                           required 
                           class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-600 outline-none">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Judul Prestasi <span class="text-red-500">*</span></label>
                        <input type="text" name="judul_prestasi" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Juara 1 Olimpiade Biologi" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tingkat Prestasi</label>
                        <select name="tingkat" required class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-600 outline-none bg-white">
                            <option value="" disabled selected>-- Pilih Tingkat Prestasi --</option>

                            <option value="Lokal">Tingkat Lokal (Kampus/Sekitar)</option>
                            <option value="Regional">Regional (Wilayah/Provinsi)</option>
                            <option value="Nasional">Luar Provinsi (Nasional)</option>
                            <option value="Internasional">Internasional</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Singkat (Opsional)</label>
                    <textarea name="deskripsi" rows="3" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Ceritakan sedikit tentang prestasi ini..."></textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Upload Foto Dokumentasi (Opsional)</label>
                    <input type="file" name="foto" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-lg bg-gray-50 cursor-pointer">
                    <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG. Maksimal 2MB.</p>
                </div>

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition">
                        Simpan Data Prestasi
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