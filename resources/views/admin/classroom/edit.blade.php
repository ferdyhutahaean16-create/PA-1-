@extends('layouts.admin.admin')

@section('title', 'Edit Ruang Kelas')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8">
            <a href="{{ route('classroom.index') }}" class="text-blue-600 hover:underline flex items-center gap-2 mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Edit Ruang Kelas</h1>
            <p class="text-gray-500 mt-1">{{ $classroom->name }}</p>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-yellow-500">
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
                    <strong class="font-bold">Gagal Menyimpan!</strong> Periksa kembali isian form Anda.
                </div>
            @endif

            <form action="{{ route('classroom.update', $classroom->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Informasi Dasar --}}
                <div>
                    <h2 class="text-lg font-bold text-gray-700 mb-4 pb-2 border-b border-gray-200">📋 Informasi Dasar</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Ruangan / Kode Kelas <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $classroom->name) }}"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 outline-none"
                                placeholder="Contoh: Ruang Kelas 1 (GD 721)" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Hari Akademik / Operasional</label>
                            <input type="text" name="academic_days" value="{{ old('academic_days', $classroom->academic_days) }}"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 outline-none"
                                placeholder="Contoh: Senin - Jumat">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi / Informasi Fasilitas</label>
                        <textarea name="description" rows="4"
                            class="ckeditor-field w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-400 outline-none"
                            placeholder="Jelaskan fasilitas pendukung tentang ruang kelas ini...">{{ old('description', $classroom->description) }}</textarea>
                    </div>
                </div>

                {{-- Upload Foto --}}
                <div>
                    <h2 class="text-lg font-bold text-gray-700 mb-4 pb-2 border-b border-gray-200">📷 Dokumentasi Ruangan</h2>
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        
                        {{-- Preview foto yang sudah ada --}}
                        @if($classroom->image)
                            <div class="mb-4 relative group w-fit">
                                <p class="text-xs text-gray-500 mb-2">Foto Saat Ini:</p>
                                <img src="{{ asset($classroom->image) }}"
                                     alt="Foto Ruangan"
                                     class="h-32 w-52 object-cover rounded-lg border border-gray-300 shadow-sm">
                                <span class="absolute bottom-2 left-2 bg-green-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">Aktif</span>
                            </div>
                            <p class="text-xs text-gray-400 mb-4">Pilih file baru di bawah ini jika ingin mengganti foto saat ini.</p>
                        @endif

                        <label class="block text-sm font-bold text-gray-700 mb-2">Unggah Foto Baru (Opsional)</label>
                        <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/webp"
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100 border border-gray-300 rounded-lg bg-white cursor-pointer">
                        <p class="text-xs text-gray-400 mt-2">Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB.</p>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex justify-end gap-3">
                    <a href="{{ route('classroom.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 px-6 rounded-lg transition">Batal</a>
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition">Update Ruangan</button>
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
    });
</script>

<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
@endsection