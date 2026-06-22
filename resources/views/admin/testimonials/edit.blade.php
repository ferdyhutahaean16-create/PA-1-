@extends('layouts.admin.admin')

@section('title', 'Edit Testimoni')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Edit Testimoni</h1>
                <p class="text-gray-500">Perbarui informasi dari {{ $testimonial->name }}.</p>
            </div>
            <a href="{{ route('testimonials.index') }}" class="text-emerald-600 hover:text-emerald-500 font-bold flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Alumni <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ $testimonial->name }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Angkatan (Tahun Lulus) <span class="text-red-500">*</span></label>
                        <input type="number" name="graduation_year" value="{{ $testimonial->graduation_year }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Jabatan</label>
                        <input type="text" name="position" value="{{ $testimonial->position }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Instansi</label>
                        <input type="text" name="workplace" value="{{ $testimonial->workplace }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Foto (Opsional)</label>
                    <div class="flex items-center gap-4">
                        @if($testimonial->photo)
                            <img src="{{ asset($testimonial->photo) }}" class="w-16 h-16 object-cover rounded-full border border-gray-300 shadow">
                        @endif
                        <input type="file" name="photo" class="flex-1 border border-gray-300 rounded-lg p-2 text-sm focus:ring-[#1a4a38]">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Isi Testimoni <span class="text-red-500">*</span></label>
                    <textarea name="testimony" rows="5" class="ckeditor-field w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#1a4a38]" required>{{ $testimonial->testimony }}</textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-emerald-600 text-white px-8 py-3 rounded-lg font-bold shadow-md hover:bg-emerald-500 transition">
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