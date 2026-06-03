@extends('layouts.admin.admin')

@section('title', 'Tambah Prestasi')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        
        {{-- Header --}}
        <div class="mb-8">
            <a href="{{ route('prestasi.index') }}" class="text-blue-600 hover:underline flex items-center gap-2 mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
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
            <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                {{-- Baris 1: Kategori & Tahun --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                        {{-- Tambahan onchange="togglePeraih()" agar formnya dinamis --}}
                        <select name="kategori" id="kategori" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" onchange="togglePeraih()" required>
                            <option value="Mahasiswa" {{ old('kategori') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                            <option value="Dosen" {{ old('kategori') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                        </select>
                    </div>
                </div>

                {{-- Baris 2: NAMA PERAIH (Dinamis: Input Teks / Dropdown Dosen) --}}
                <div class="w-full p-5 bg-gray-50 border border-gray-100 rounded-xl">
                    
                    {{-- Opsi A: Jika Kategori = Mahasiswa (Teks Biasa) --}}
                    <div id="input_mahasiswa">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Mahasiswa / Tim Peraih Prestasi <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_peraih" id="nama_peraih" value="{{ old('nama_peraih') }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Budi Santoso (Atau: Tim Robotik Biotek)">
                    </div>

                    {{-- Opsi B: Jika Kategori = Dosen (Dropdown Database) --}}
                    <div id="input_dosen" style="display: none;">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Dosen (Tenaga Pendidik) <span class="text-red-500">*</span></label>
                        <select name="tenaga_pendidik_id" id="tenaga_pendidik_id" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option value="">-- Pilih Dosen Peraih Prestasi --</option>
                            @if(isset($dosens))
                                @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->id }}" {{ old('tenaga_pendidik_id') == $dosen->id ? 'selected' : '' }}>
                                        {{ $dosen->nama }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                {{-- Baris 3: Tanggal Spesifik & Nama Acara (BARU) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Perolehan <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_perolehan" value="{{ old('tanggal_perolehan') }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Acara / Kompetisi <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_prestasi" value="{{ old('nama_prestasi') }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Gemastik XIV" required>
                    </div>
                </div>

                {{-- Baris 4: Judul & Tingkat --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Judul Prestasi <span class="text-red-500">*</span></label>
                        <input type="text" name="judul_prestasi" value="{{ old('judul_prestasi') }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Medali Emas Olimpiade" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tingkat Prestasi <span class="text-red-500">*</span></label>
                        <select name="tingkat" required class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 bg-white">
                            <option value="" disabled selected>-- Pilih Tingkat Prestasi --</option>
                            <option value="Lokal" {{ old('tingkat') == 'Lokal' ? 'selected' : '' }}>Tingkat Lokal (Kampus/Sekitar)</option>
                            <option value="Regional" {{ old('tingkat') == 'Regional' ? 'selected' : '' }}>Regional (Wilayah/Provinsi)</option>
                            <option value="Nasional" {{ old('tingkat') == 'Nasional' ? 'selected' : '' }}>Luar Provinsi (Nasional)</option>
                            <option value="Internasional" {{ old('tingkat') == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                        </select>
                    </div>
                </div>

                {{-- Baris 5: Penyelenggara --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pihak Penyelenggara <span class="text-red-500">*</span></label>
                    <input type="text" name="penyelenggara" value="{{ old('penyelenggara') }}" placeholder="Contoh: Kemendikbudristek" required class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Baris 6: Deskripsi --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Singkat (Opsional)</label>
                    <textarea name="deskripsi" rows="3" class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Ceritakan sedikit tentang prestasi ini...">{{ old('deskripsi') }}</textarea>
                </div>

                {{-- Baris 7: Upload Foto --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Upload Foto Dokumentasi (Opsional)</label>
                    <input type="file" name="foto" accept="image/jpeg,image/png,image/jpg" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-lg bg-gray-50 cursor-pointer">
                    <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG. Maksimal 2MB.</p>
                </div>

                {{-- Tombol Submit --}}
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

{{-- SCRIPT PENTING: CKEditor & Logika Pergantian Kategori Dosen/Mahasiswa --}}
<script>
    // 1. Script Logika Dropdown Dosen vs Input Mahasiswa
    function togglePeraih() {
        let kategori = document.getElementById('kategori').value;
        let inputDosen = document.getElementById('input_dosen');
        let inputMahasiswa = document.getElementById('input_mahasiswa');
        
        let selectDosen = document.getElementById('tenaga_pendidik_id');
        let textMahasiswa = document.getElementById('nama_peraih');

        if (kategori === 'Dosen') {
            inputDosen.style.display = 'block';
            inputMahasiswa.style.display = 'none';
            selectDosen.setAttribute('required', 'required');
            textMahasiswa.removeAttribute('required');
        } else {
            inputDosen.style.display = 'none';
            inputMahasiswa.style.display = 'block';
            textMahasiswa.setAttribute('required', 'required');
            selectDosen.removeAttribute('required');
        }
    }

    // 2. Script CKEditor dan Inisialisasi
    document.addEventListener("DOMContentLoaded", function() {
        // Panggil fungsi toggle saat halaman pertama dimuat
        togglePeraih();

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