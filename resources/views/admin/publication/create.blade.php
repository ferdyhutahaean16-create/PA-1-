@extends('layouts.admin.admin')

@section('title', 'Tambah Publikasi')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <a href="{{ route('publication.index') }}" class="text-emerald-600 hover:text-emerald-500 hover:underline mb-6 inline-block font-semibold">← Kembali</a>
        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-blue-500">
            <h1 class="text-2xl font-bold mb-6">Tambah Publikasi</h1>
            
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
                    <strong class="font-bold">Gagal Menyimpan!</strong> Silakan perbaiki kesalahan berikut:
                    <ul class="list-disc ml-5 mt-2 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('publication.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold mb-2">Kategori *</label>
                        <select name="category" id="category" class="w-full p-3 border rounded-lg bg-white" required>
                            <option value="Mahasiswa" {{ old('category') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                            <option value="Dosen" {{ old('category') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2">Bulan & Tahun Publikasi *</label>
                        <input type="text" name="publication_date" value="{{ old('publication_date') }}" class="w-full p-3 border rounded-lg" placeholder="Contoh: April 2024" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold mb-2">Judul Publikasi / Jurnal *</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full p-3 border rounded-lg" placeholder="Masukkan judul publikasi..." required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label id="lecturer-label" class="block text-sm font-bold mb-2">Dosen Pendamping / Supervisor *</label>
                        <select name="lecturer_id" id="lecturer_id" class="w-full p-3 border rounded-lg bg-white" required>
                            <option value="" disabled selected>-- Pilih Nama Dosen --</option>
                            @foreach($lecturers as $lecturer)
                                <option value="{{ $lecturer->id }}" {{ old('lecturer_id') == $lecturer->id ? 'selected' : '' }}>
                                    {{ $lecturer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold mb-2">Nama Penulis (Sesuai Dokumen) *</label>
                        <input type="text" name="author" id="author" value="{{ old('author') }}" class="w-full p-3 border rounded-lg" placeholder="Contoh: Ferdy Roberto, Budi Santoso" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold mb-2">Tipe Publikasi</label>
                        <input type="text" name="publication_type" value="{{ old('publication_type') }}" class="w-full p-3 border rounded-lg" placeholder="Contoh: Jurnal Nasional, Prosiding">
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2">Cover Jurnal / Artikel (Gambar)</label>
                        <input type="file" name="cover_image" accept="image/*" class="w-full border p-2.5 rounded-lg bg-gray-50 cursor-pointer">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold mb-2">Link Download PDF (URL)</label>
                        <input type="url" name="download_link" value="{{ old('download_link') }}" class="w-full p-3 border rounded-lg" placeholder="https://...">
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2">Link Website Jurnal (URL)</label>
                        <input type="url" name="view_link" value="{{ old('view_link') }}" class="w-full p-3 border rounded-lg" placeholder="https://...">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold mb-2">Abstrak / Deskripsi</label>
                    <textarea name="description" rows="4" class="ckeditor-field w-full p-3 border rounded-lg">{{ old('description') }}</textarea>
                </div>

                <div class="flex justify-end w-full">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3 px-8 rounded-lg w-full md:w-auto transition shadow-md">
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
        // Inisialisasi CKEditor
        let editors = document.querySelectorAll('.ckeditor-field');
        editors.forEach(function(editorElement) {
            ClassicEditor
                .create(editorElement, {
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ]
                })
                .catch(error => {
                    console.error(error);
                });
        });

        // Logika Interaktif Pengisian Nama Penulis Otomatis
        const categorySelect = document.getElementById('category');
        const lecturerSelect = document.getElementById('lecturer_id');
        const lecturerLabel = document.getElementById('lecturer-label');
        const authorInput = document.getElementById('author');

        function adjustFormLayout() {
            if (categorySelect.value === 'Dosen') {
                lecturerLabel.innerHTML = 'Nama Dosen (Penulis Utama) *';
                // Jika dosen dipilih, otomatis isikan namanya ke input text penulis
                if(lecturerSelect.selectedIndex > 0) {
                    authorInput.value = lecturerSelect.options[lecturerSelect.selectedIndex].text.trim();
                }
            } else {
                lecturerLabel.innerHTML = 'Dosen Pendamping / Supervisor *';
            }
        }

        // Jalankan saat kategori berganti atau dropdown dosen dipilih
        categorySelect.addEventListener('change', function() {
            if(this.value === 'Mahasiswa') {
                authorInput.value = ''; // Reset jika pindah ke mahasiswa
            }
            adjustFormLayout();
        });
        
        lecturerSelect.addEventListener('change', adjustFormLayout);
        
        // Eksekusi pertama kali saat reload halaman
        adjustFormLayout();
    });
</script>

<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
@endsection