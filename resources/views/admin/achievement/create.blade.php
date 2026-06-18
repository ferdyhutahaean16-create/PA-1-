@extends('layouts.admin.admin')

@section('title', 'Tambah Prestasi')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        
        {{-- Header --}}
        <div class="mb-8">
            <a href="{{ route('achievement.index') }}" class="text-emerald-600 hover:text-emerald-500 flex items-center gap-2 mb-4 font-semibold">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Tambah Data Prestasi</h1>
        </div>

        {{-- Pesan Eror Validasi --}}
        @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r-lg shadow-sm">
            <div class="flex items-center mb-2">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                <strong class="font-bold">Gagal Menyimpan Data!</strong>
            </div>
            <ul class="list-disc pl-7 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Form Card --}}
        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-blue-500">
            <form action="{{ route('achievement.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                {{-- Baris 1: Kategori --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select name="category" id="kategori" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                            <option value="Mahasiswa" {{ old('category') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                            <option value="Dosen" {{ old('category') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                        </select>
                    </div>
                </div>

                {{-- Baris 2: NAMA PERAIH (Dinamis: Input Teks / Dropdown Dosen) --}}
                <div class="w-full p-5 bg-gray-50 border border-gray-100 rounded-xl">
                    
                    {{-- Opsi A: Jika Kategori = Mahasiswa (Teks Biasa) --}}
                    <div id="wrapper_mahasiswa">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Mahasiswa / Tim Peraih Prestasi <span class="text-red-500">*</span></label>
                        <input type="text" name="achiever_name" id="nama_peraih" value="{{ old('achiever_name') }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Budi Santoso (Atau: Tim Robotik Biotek)">
                    </div>

                    {{-- Opsi B: Jika Kategori = Dosen (Dropdown Database) --}}
                    <div id="wrapper_lecturer" style="display: none;">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Dosen (Tenaga Pendidik) <span class="text-red-500">*</span></label>
                        <select name="lecturer_id" id="lecturer_id" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 bg-white">
                            <option value="">-- Pilih Dosen Peraih Prestasi --</option>
                            @if(isset($lecturers))
                                @foreach($lecturers as $dosen)
                                    <option value="{{ $dosen->id }}" {{ old('lecturer_id') == $dosen->id ? 'selected' : '' }}>
                                        {{ $dosen->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                {{-- Baris 3: Tanggal Spesifik & Nama Acara --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Perolehan <span class="text-red-500">*</span></label>
                        <input type="date" name="date_earned" value="{{ old('date_earned') }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Acara / Kompetisi <span class="text-red-500">*</span></label>
                        <input type="text" name="achievement_name" value="{{ old('achievement_name') }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Juara 1 Gemastik XIV" required>
                    </div>
                </div>

                {{-- Baris 4: Tingkat & Penyelenggara --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pihak Penyelenggara</label>
                        <input type="text" name="organizer" value="{{ old('organizer') }}" placeholder="Contoh: Kemendikbudristek" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tingkat Prestasi <span class="text-red-500">*</span></label>
                        <select name="level" required class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 bg-white">
                            <option value="Local" {{ old('level') == 'Local' ? 'selected' : '' }}>Tingkat Lokal (Kampus/Sekitar)</option>
                            <option value="Regional" {{ old('level') == 'Regional' ? 'selected' : '' }}>Regional (Wilayah/Provinsi)</option>
                            <option value="National" {{ old('level') == 'National' ? 'selected' : '' }}>Luar Provinsi (Nasional)</option>
                            <option value="International" {{ old('level') == 'International' ? 'selected' : '' }}>Internasional</option>
                        </select>
                    </div>
                </div>

                {{-- Baris 5: Deskripsi --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Singkat (Opsional)</label>
                    <textarea name="description" rows="3" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Ceritakan sedikit tentang prestasi ini...">{{ old('description') }}</textarea>
                </div>

                {{-- Baris 6: Upload Foto --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Upload Foto Dokumentasi (Opsional)</label>
                    <input type="file" name="certificate_file" accept="image/jpeg,image/png,image/jpg" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-lg bg-gray-50 cursor-pointer">
                    <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG. Maksimal 2MB.</p>
                </div>

                {{-- Tombol Submit --}}
                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

{{-- SCRIPT PENTING: CKEditor & Logika Pergantian Kategori Dosen/Mahasiswa --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const kategoriSelect = document.getElementById('kategori');
        const wrapperLecturer = document.getElementById('wrapper_lecturer');
        const wrapperMahasiswa = document.getElementById('wrapper_mahasiswa');
        const selectDosen = document.getElementById('lecturer_id');
        const textMahasiswa = document.getElementById('nama_peraih');

        function togglePeraih() {
            if (kategoriSelect.value === 'Dosen') {
                wrapperLecturer.style.display = 'block';
                wrapperMahasiswa.style.display = 'none';
                selectDosen.setAttribute('required', 'required');
                textMahasiswa.removeAttribute('required');
            } else {
                wrapperLecturer.style.display = 'none';
                wrapperMahasiswa.style.display = 'block';
                textMahasiswa.setAttribute('required', 'required');
                selectDosen.removeAttribute('required');
            }
        }

        // Jalankan saat pertama kali dimuat
        togglePeraih();

        // Jalankan saat kategori diubah
        kategoriSelect.addEventListener('change', togglePeraih);

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