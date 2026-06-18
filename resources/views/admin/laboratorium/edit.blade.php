@extends('layouts.admin.admin')

@section('title', 'Edit Laboratorium')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Edit Laboratorium</h1>
                <p class="text-gray-500">Perbarui data atau foto untuk {{ $lab->name }}.</p>
            </div>
            <a href="{{ route('fasilitas.index') }}" class="text-emerald-600 hover:text-emerald-500 font-bold flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <form action="{{ route('fasilitas.update', $lab->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                @method('PUT') 
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Laboratorium <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_lab" value="{{ $lab->name }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Kepala Laboratorium</label>
                            <input type="text" name="kepala_lab" value="{{ $lab->head_of_lab }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Fasilitas Utama</label>
                        <input type="text" name="fasilitas" value="{{ $lab->facilities }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Ruangan</label>
                        <textarea name="deskripsi" rows="4" class="ckeditor-field w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]">{{ $lab->description }}</textarea>
                    </div>

                    <div class="pt-6 border-t border-gray-100">
                        <label class="block text-sm font-bold text-gray-700 mb-4">Ganti Foto Ruangan (Biarkan kosong jika tidak ingin mengganti)</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            
                            <div class="border border-gray-200 p-4 rounded-lg bg-gray-50 flex items-center gap-4">
                                @if($lab->image)
                                    <img src="{{ asset($lab->image) }}" class="w-16 h-16 object-cover rounded shadow-sm border border-gray-200">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center text-xs text-gray-400">Kosong</div>
                                @endif
                                <div class="flex-1">
                                    <label class="text-xs font-bold text-gray-500 mb-1 block">Foto Utama</label>
                                    <input type="file" name="foto" accept="image/*" class="w-full text-xs">
                                </div>
                            </div>

                            <div class="border border-gray-200 p-4 rounded-lg bg-gray-50 flex items-center gap-4">
                                @if($lab->image_2)
                                    <img src="{{ asset($lab->image_2) }}" class="w-16 h-16 object-cover rounded shadow-sm border border-gray-200">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center text-xs text-gray-400">Kosong</div>
                                @endif
                                <div class="flex-1">
                                    <label class="text-xs font-bold text-gray-500 mb-1 block">Foto Pendukung 1</label>
                                    <input type="file" name="foto_2" accept="image/*" class="w-full text-xs">
                                </div>
                            </div>

                            <div class="border border-gray-200 p-4 rounded-lg bg-gray-50 flex items-center gap-4">
                                @if($lab->image_3)
                                    <img src="{{ asset($lab->image_3) }}" class="w-16 h-16 object-cover rounded shadow-sm border border-gray-200">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center text-xs text-gray-400">Kosong</div>
                                @endif
                                <div class="flex-1">
                                    <label class="text-xs font-bold text-gray-500 mb-1 block">Foto Pendukung 2</label>
                                    <input type="file" name="foto_3" accept="image/*" class="w-full text-xs">
                                </div>
                            </div>

                            <div class="border border-gray-200 p-4 rounded-lg bg-gray-50 flex items-center gap-4">
                                @if($lab->image_4)
                                    <img src="{{ asset($lab->image_4) }}" class="w-16 h-16 object-cover rounded shadow-sm border border-gray-200">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center text-xs text-gray-400">Kosong</div>
                                @endif
                                <div class="flex-1">
                                    <label class="text-xs font-bold text-gray-500 mb-1 block">Foto Pendukung 3</label>
                                    <input type="file" name="foto_4" accept="image/*" class="w-full text-xs">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="bg-emerald-600 text-white px-8 py-3 rounded-lg font-bold shadow hover:bg-emerald-500 transition">
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