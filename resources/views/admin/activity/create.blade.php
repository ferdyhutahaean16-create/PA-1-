@extends('layouts.admin.admin')

@section('title', 'Tambah Kegiatan')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8 border-b border-gray-200 pb-4 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Tambah Data Kegiatan</h1>
                <p class="text-sm text-gray-500 mt-1">Lengkapi data di bawah ini untuk menambahkan dokumentasi kegiatan Program Studi.</p>
            </div>
            <a href="{{ route('activity.index') }}" class="bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 px-4 py-2 rounded-lg shadow-sm font-semibold transition flex items-center gap-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-green-600">
            
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
                    <strong class="font-bold">Gagal Menyimpan!</strong> Silakan perbaiki:
                    <ul class="list-disc ml-5 mt-2 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('activity.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kategori Kegiatan <span class="text-red-500">*</span></label>
                        <select name="category" id="category" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-emerald-600 outline-none bg-white" required>
                            <option value="Lecturer Service" {{ old('category') == 'Lecturer Service' ? 'selected' : '' }}>Pengabdian Masyarakat (PKM) Dosen</option>
                            <option value="Student Activity" {{ old('category') == 'Student Activity' ? 'selected' : '' }}>Kegiatan Mahasiswa</option>
                            <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Waktu Pelaksanaan <span class="text-red-500">*</span></label>
                        <input type="date" name="execution_time" value="{{ old('execution_time') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-emerald-600 outline-none bg-white" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Judul / Nama Kegiatan <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Sosialisasi Pupuk Organik di Desa X" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-emerald-600 outline-none" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label id="lecturer-label" class="block text-sm font-bold text-gray-700 mb-2">Dosen Penanggung Jawab *</label>
                        <select name="lecturer_id" id="lecturer_id" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-emerald-600 outline-none bg-white" required>
                            <option value="" disabled selected>-- Pilih Nama Dosen --</option>
                            @foreach($lecturers as $lecturer)
                                <option value="{{ $lecturer->id }}" {{ old('lecturer_id') == $lecturer->id ? 'selected' : '' }}>{{ $lecturer->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pelaksana (Ketua Tim / Organisasi) <span class="text-red-500">*</span></label>
                        <input type="text" name="executor" id="executor" value="{{ old('executor') }}" placeholder="Contoh: HIMA Biotek / Nama Tim" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-emerald-600 outline-none" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tempat / Lokasi (Opsional)</label>
                    <input type="text" name="location" value="{{ old('location') }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 outline-none" placeholder="Contoh: Aula Desa Laguboti">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Kegiatan (Opsional)</label>
                    <textarea name="description" rows="4" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 outline-none" placeholder="Ceritakan singkat tentang kegiatan ini...">{{ old('description') }}</textarea>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Upload Foto Dokumentasi (Opsional)</label>
                    <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 border border-gray-300 rounded-lg bg-white cursor-pointer">
                    <p class="text-xs text-gray-400 mt-2">Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB. Gunakan orientasi lanskap (melebar) agar lebih bagus.</p>
                </div>

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition">
                        Simpan Data Kegiatan
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

        // 2. Logika Sinkronisasi Dropdown & Input Teks Pelaksana
        const categorySelect = document.getElementById('category');
        const lecturerSelect = document.getElementById('lecturer_id');
        const lecturerLabel = document.getElementById('lecturer-label');
        const executorInput = document.getElementById('executor');

        function adjustActivityForm() {
            if (categorySelect.value === 'Lecturer Service') {
                lecturerLabel.innerHTML = 'Dosen Pelaksana Utama *';
                // Jika dosen dipilih, salin nama dosen ke kolom pelaksana otomatis
                if (lecturerSelect.selectedIndex > 0) {
                    executorInput.value = lecturerSelect.options[lecturerSelect.selectedIndex].text.trim();
                }
            } else {
                lecturerLabel.innerHTML = 'Dosen Penanggung Jawab / Pembina *';
            }
        }

        categorySelect.addEventListener('change', function() {
            if (this.value !== 'Lecturer Service') {
                executorInput.value = ''; // Reset isi jika pindah ke kegiatan mahasiswa
            }
            adjustActivityForm();
        });

        lecturerSelect.addEventListener('change', adjustActivityForm);

        // Panggil pertama kali saat halaman dimuat
        adjustActivityForm();
    });
</script>

<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
@endsection