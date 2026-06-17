@extends('layouts.admin.admin')

@section('title', 'Edit Data Publikasi')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Edit Data Publikasi</h1>
                <p class="text-gray-500 mt-1">Perbarui informasi karya ilmiah dan publikasi sivitas akademika.</p>
            </div>
            <a href="{{ route('publication.index') }}" class="bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 px-5 py-2.5 rounded-lg shadow-sm font-semibold transition flex items-center gap-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Batal & Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
                <strong class="font-bold">Gagal Memperbarui!</strong> Silakan perbaiki kesalahan berikut:
                <ul class="list-disc ml-5 mt-2 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-yellow-500">
            <form action="{{ route('publication.update', $publication->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf 
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select name="category" id="category" class="w-full p-3 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-yellow-500" required>
                            <option value="Mahasiswa" {{ old('category', $publication->category) == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                            <option value="Dosen" {{ old('category', $publication->category) == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Bulan & Tahun Publikasi <span class="text-red-500">*</span></label>
                        <input type="text" name="publication_date" value="{{ old('publication_date', $publication->publication_date) }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Judul Publikasi / Jurnal <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $publication->title) }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label id="lecturer-label" class="block text-sm font-bold text-gray-700 mb-2">Dosen Pendamping / Supervisor *</label>
                        <select name="lecturer_id" id="lecturer_id" class="w-full p-3 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-yellow-500" required>
                            <option value="" disabled>-- Pilih Nama Dosen --</option>
                            @foreach($lecturers as $lecturer)
                                <option value="{{ $lecturer->id }}" {{ old('lecturer_id', $publication->lecturer_id) == $lecturer->id ? 'selected' : '' }}>
                                    {{ $lecturer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Penulis (Sesuai Dokumen) <span class="text-red-500">*</span></label>
                        <input type="text" name="author" id="author" value="{{ old('author', $publication->author) }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tipe Publikasi</label>
                        <input type="text" name="publication_type" value="{{ old('publication_type', $publication->publication_type) }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" placeholder="Contoh: Jurnal Nasional">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Link Download PDF (URL)</label>
                        <input type="url" name="download_link" value="{{ old('download_link', $publication->download_link) }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Link Website Jurnal (URL)</label>
                        <input type="url" name="view_link" value="{{ old('view_link', $publication->view_link) }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Abstrak / Deskripsi</label>
                    <textarea name="description" rows="4" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">{{ old('description', $publication->description) }}</textarea>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <label class="block text-sm font-bold text-gray-700 mb-4">Cover Jurnal / Artikel (Gambar)</label>
                    
                    @if($publication->cover_image)
                        <div class="mb-4">
                            <p class="text-xs text-gray-500 mb-2">Cover Saat Ini:</p>
                            <img src="{{ asset($publication->cover_image) }}" class="h-32 w-auto object-cover rounded border shadow-sm">
                        </div>
                    @endif
                    
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ganti Cover (Opsional)</label>
                    <input type="file" name="cover_image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100 border border-gray-300 rounded-lg bg-white cursor-pointer">
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

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Inisialisasi CKEditor
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

        // 2. Logika Sinkronisasi Nama Penulis Otomatis
        const categorySelect = document.getElementById('category');
        const lecturerSelect = document.getElementById('lecturer_id');
        const lecturerLabel = document.getElementById('lecturer-label');
        const authorInput = document.getElementById('author');

        function adjustFormLayout(isInitialLoad = false) {
            if (categorySelect.value === 'Dosen') {
                lecturerLabel.innerHTML = 'Nama Dosen (Penulis Utama) *';
                // Salin nama hanya jika bukan saat halaman pertama kali dimuat (menghindari penimpaan data lama)
                if (!isInitialLoad && lecturerSelect.selectedIndex > 0) {
                    authorInput.value = lecturerSelect.options[lecturerSelect.selectedIndex].text.trim();
                }
            } else {
                lecturerLabel.innerHTML = 'Dosen Pendamping / Supervisor *';
            }
        }

        // Jalankan pelacak event berganti
        categorySelect.addEventListener('change', function() {
            adjustFormLayout(false);
        });
        
        lecturerSelect.addEventListener('change', function() {
            adjustFormLayout(false);
        });
        
        // Jalankan pertama kali secara aman tanpa merusak teks author bawaan database
        adjustFormLayout(true);
    });
</script>

<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
@endsection