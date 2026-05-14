@extends('layouts.admin.admin')
@section('title', 'Tambah Publikasi')
@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <a href="{{ route('publikasi.index') }}" class="text-blue-600 hover:underline mb-6 inline-block">← Kembali</a>
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
            <form action="{{ route('publikasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div><label class="block text-sm font-bold mb-2">Kategori *</label><select name="kategori" class="w-full p-3 border rounded-lg" required><option value="Mahasiswa">Mahasiswa</option><option value="Dosen">Dosen</option></select></div>
                    <div><label class="block text-sm font-bold mb-2">Bulan & Tahun *</label><input type="text" name="tanggal_publikasi" class="w-full p-3 border rounded-lg" placeholder="Contoh: April 2024" required></div>
                </div>
                <div><label class="block text-sm font-bold mb-2">Judul Publikasi *</label><input type="text" name="judul" class="w-full p-3 border rounded-lg" required></div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div><label class="block text-sm font-bold mb-2">Nama Penulis *</label><input type="text" name="penulis" class="w-full p-3 border rounded-lg" required></div>
                    <div><label class="block text-sm font-bold mb-2">Tipe Publikasi</label><input type="text" name="tipe_publikasi" class="w-full p-3 border rounded-lg" placeholder="Contoh: Jurnal Nasional"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div><label class="block text-sm font-bold mb-2">Link Download PDF (Url)</label><input type="url" name="link_download" class="w-full p-3 border rounded-lg"></div>
                    <div><label class="block text-sm font-bold mb-2">Link Website Jurnal (Url)</label><input type="url" name="link_view" class="w-full p-3 border rounded-lg"></div>
                </div>
                <div><label class="block text-sm font-bold mb-2">Abstrak / Deskripsi</label><textarea name="deskripsi" rows="4" class="ckeditor-field w-full p-3 border rounded-lg"></textarea></div>
                <div><label class="block text-sm font-bold mb-2">Cover Jurnal/Artikel (Gambar)</label><input type="file" name="gambar" class="w-full border p-2 rounded-lg bg-gray-50"></div>
                <button type="submit" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-lg w-full md:w-auto">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection@extends('layouts.admin.admin')
@section('title', 'Tambah Publikasi')
@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <a href="{{ route('publikasi.index') }}" class="text-blue-600 hover:underline mb-6 inline-block">← Kembali</a>
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
            <form action="{{ route('publikasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div><label class="block text-sm font-bold mb-2">Kategori *</label><select name="kategori" class="w-full p-3 border rounded-lg" required><option value="Mahasiswa">Mahasiswa</option><option value="Dosen">Dosen</option></select></div>
                    <div><label class="block text-sm font-bold mb-2">Bulan & Tahun *</label><input type="text" name="tanggal_publikasi" class="w-full p-3 border rounded-lg" placeholder="Contoh: April 2024" required></div>
                </div>
                <div><label class="block text-sm font-bold mb-2">Judul Publikasi *</label><input type="text" name="judul" class="w-full p-3 border rounded-lg" required></div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div><label class="block text-sm font-bold mb-2">Nama Penulis *</label><input type="text" name="penulis" class="w-full p-3 border rounded-lg" required></div>
                    <div><label class="block text-sm font-bold mb-2">Tipe Publikasi</label><input type="text" name="tipe_publikasi" class="w-full p-3 border rounded-lg" placeholder="Contoh: Jurnal Nasional"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div><label class="block text-sm font-bold mb-2">Link Download PDF (Url)</label><input type="url" name="link_download" class="w-full p-3 border rounded-lg"></div>
                    <div><label class="block text-sm font-bold mb-2">Link Website Jurnal (Url)</label><input type="url" name="link_view" class="w-full p-3 border rounded-lg"></div>
                </div>
                <div><label class="block text-sm font-bold mb-2">Abstrak / Deskripsi</label><textarea name="deskripsi" rows="4" class="ckeditor-field w-full p-3 border rounded-lg"></textarea></div>
                <div><label class="block text-sm font-bold mb-2">Cover Jurnal/Artikel (Gambar)</label><input type="file" name="gambar" class="w-full border p-2 rounded-lg bg-gray-50"></div>
                <button type="submit" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-lg w-full md:w-auto">Simpan</button>
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