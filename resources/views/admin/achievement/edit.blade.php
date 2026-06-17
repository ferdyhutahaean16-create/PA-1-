@extends('layouts.admin.admin')

@section('title', 'Edit Prestasi')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8">
            <a href="{{ route('achievement.index') }}" class="text-blue-600 hover:underline flex items-center gap-2 mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Batal
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Edit Data Prestasi</h1>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-xl shadow-sm">
                <strong class="font-bold">Gagal Menyimpan Data!</strong>
                <ul class="list-disc ml-5 mt-2 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-yellow-500">
            <form action="{{ route('achievement.update', $achievement->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select name="category" id="kategori" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                            <option value="Mahasiswa" {{ $achievement->category == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                            <option value="Dosen" {{ $achievement->category == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tahun / Tanggal Perolehan <span class="text-red-500">*</span></label>
                        {{-- Menggunakan format date agar sesuai tipe data --}}
                        <input type="date" name="date_earned" value="{{ old('date_earned', $achievement->date_earned) }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                    </div>
                </div>

                {{-- Opsi ini disembunyikan/ditampilkan berdasarkan kategori --}}
                <div id="wrapper_lecturer" class="{{ $achievement->category == 'Dosen' ? 'block' : 'hidden' }}">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pilih Dosen Peraih <span class="text-red-500">*</span></label>
                    <select name="lecturer_id" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 bg-white">
                        <option value="">-- Pilih Dosen IT Del --</option>
                        @foreach($lecturers as $dosen)
                            <option value="{{ $dosen->id }}" {{ $achievement->lecturer_id == $dosen->id ? 'selected' : '' }}>
                                {{ $dosen->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div id="wrapper_mahasiswa" class="{{ $achievement->category == 'Mahasiswa' ? 'block' : 'hidden' }}">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Peraih Prestasi (Mahasiswa) <span class="text-red-500">*</span></label>
                    <input type="text" name="achiever_name" value="{{ old('achiever_name', $achievement->achiever_name) }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pihak Penyelenggara</label>
                    <input type="text" name="organizer" 
                           value="{{ old('organizer', $achievement->organizer) }}" 
                           placeholder="Contoh: Kemendikbudristek, LIPI, atau Universitas Gadjah Mada"
                           class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-600 outline-none">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Judul Prestasi <span class="text-red-500">*</span></label>
                        <input type="text" name="achievement_name" value="{{ old('achievement_name', $achievement->achievement_name) }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tingkat Prestasi</label>
                        <select name="level" required class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-600 outline-none bg-white">
                            <option value="Local" {{ $achievement->level == 'Local' ? 'selected' : '' }}>Tingkat Lokal (Kampus/Sekitar)</option>
                            <option value="Regional" {{ $achievement->level == 'Regional' ? 'selected' : '' }}>Regional (Wilayah/Provinsi)</option>
                            <option value="National" {{ $achievement->level == 'National' ? 'selected' : '' }}>Luar Provinsi (Nasional)</option>
                            <option value="International" {{ $achievement->level == 'International' ? 'selected' : '' }}>Internasional</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Singkat</label>
                    <textarea name="description" rows="3" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500">{{ old('description', $achievement->description) }}</textarea>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <label class="block text-sm font-bold text-gray-700 mb-4">Media Foto / Bukti Sertifikat</label>
                    @if($achievement->certificate_file)
                        <div class="mb-4">
                            <p class="text-xs text-gray-500 mb-2">Foto / Dokumen Saat Ini:</p>
                            <img src="{{ asset($achievement->certificate_file) }}" class="h-32 rounded-lg border shadow-sm object-cover">
                        </div>
                    @endif
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ganti Dokumen (Opsional)</label>
                    <input type="file" name="certificate_file" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100 border border-gray-300 rounded-lg bg-white cursor-pointer">
                </div>

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition">
                        Update Data Prestasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Logika Dropdown Dosen / Mahasiswa
        const kategoriSelect = document.getElementById('kategori');
        const wrapperLecturer = document.getElementById('wrapper_lecturer');
        const wrapperMahasiswa = document.getElementById('wrapper_mahasiswa');

        kategoriSelect.addEventListener('change', function() {
            if (this.value === 'Dosen') {
                wrapperLecturer.classList.remove('hidden');
                wrapperMahasiswa.classList.add('hidden');
            } else {
                wrapperLecturer.classList.add('hidden');
                wrapperMahasiswa.classList.remove('hidden');
            }
        });

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
    });
</script>

<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
@endsection