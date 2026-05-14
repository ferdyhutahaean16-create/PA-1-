@extends('layouts.admin.admin')

@section('title', 'Tambah Ruang Kelas')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8">
            <a href="{{ route('ruang-kelas.index') }}" class="text-blue-600 hover:underline flex items-center gap-2 mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Tambah Ruang Kelas</h1>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-blue-600">
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
                    <strong class="font-bold">Gagal Menyimpan!</strong> Periksa isian form Anda.
                </div>
            @endif

            <form action="{{ route('ruang-kelas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                {{-- Informasi Dasar --}}
                <div>
                    <h2 class="text-lg font-bold text-gray-700 mb-4 pb-2 border-b border-gray-200">📋 Informasi Dasar</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Ruangan <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_ruangan" value="{{ old('nama_ruangan') }}"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                placeholder="Contoh: Ruang Kelas 1 (GD 721)" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Kapasitas (Orang)</label>
                            <input type="number" name="kapasitas" value="{{ old('kapasitas') }}"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                placeholder="Contoh: 40">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Fasilitas Pendukung</label>
                        <input type="text" name="fasilitas_pendukung" value="{{ old('fasilitas_pendukung') }}"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                            placeholder="Pisahkan dengan koma, contoh: AC, Proyektor, Papan Tulis, Wi-Fi">
                        <p class="text-xs text-gray-400 mt-1">Pisahkan setiap fasilitas dengan tanda koma ( , )</p>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi / Informasi Umum</label>
                        <textarea name="deskripsi" rows="4"
                            class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                            placeholder="Jelaskan informasi umum tentang ruang kelas ini...">{{ old('deskripsi') }}</textarea>
                    </div>
                </div>

                {{-- Jam Kerja --}}
                <div>
                    <h2 class="text-lg font-bold text-gray-700 mb-4 pb-2 border-b border-gray-200">🕐 Jam Kerja</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Hari Akademik</label>
                            <input type="text" name="hari_akademik" value="{{ old('hari_akademik') }}"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                placeholder="Contoh: Senin - Jumat">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Jam Akademik</label>
                            <input type="text" name="jam_akademik" value="{{ old('jam_akademik') }}"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                placeholder="Contoh: 07.00 - 17.00">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Jam Kolaboratif</label>
                            <input type="text" name="jam_kolaboratif" value="{{ old('jam_kolaboratif') }}"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                placeholder="Contoh: 19.00 - 22.00">
                        </div>
                    </div>
                </div>

                {{-- Upload Foto --}}
                <div>
                    <h2 class="text-lg font-bold text-gray-700 mb-4 pb-2 border-b border-gray-200">📷 Galeri Foto (Maks. 4 Foto)</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach(['foto' => 'Foto 1 (Utama)', 'foto_2' => 'Foto 2', 'foto_3' => 'Foto 3', 'foto_4' => 'Foto 4'] as $name => $label)
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                            <label class="block text-sm font-bold text-gray-700 mb-2">{{ $label }}</label>
                            <input type="file" name="{{ $name }}" accept="image/jpeg,image/png,image/jpg"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-lg bg-white cursor-pointer">
                            <p class="text-xs text-gray-400 mt-1">JPG, PNG maksimal 2MB</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex justify-end gap-3">
                    <a href="{{ route('ruang-kelas.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 px-6 rounded-lg transition">Batal</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition">Simpan Ruangan</button>
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