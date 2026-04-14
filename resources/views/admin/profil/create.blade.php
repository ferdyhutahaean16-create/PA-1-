@extends('layouts.admin.admin')

@section('title', 'Tambah Profil & Struktur')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6 max-w-5xl">
        
        <div class="mb-8">
            <a href="{{ route('profil.index') }}" class="text-blue-600 hover:underline flex items-center gap-2 mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar Profil
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Tambah Data Profil Program Studi</h1>
            <p class="text-gray-500 mt-2">Silakan isi teks informasi dan unggah bagan struktur di tab yang berbeda.</p>
        </div>

        <div class="flex border-b border-gray-200 mb-6">
            <button onclick="switchTab('teks')" id="tab-teks" type="button" class="py-3 px-6 text-sm font-bold border-b-2 border-blue-600 text-blue-600 focus:outline-none transition-colors">
                1. Informasi Program Studi
            </button>
            <button onclick="switchTab('struktur')" id="tab-struktur" type="button" class="py-3 px-6 text-sm font-bold border-b-2 border-transparent text-gray-500 hover:text-gray-700 focus:outline-none transition-colors">
                2. Bagan Struktur Organisasi
            </button>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
            
            <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div id="konten-teks" class="block space-y-6">
                    <div class="bg-blue-50 p-4 rounded-lg mb-4 border border-blue-100">
                        <p class="text-sm text-blue-800 font-semibold">Bagian ini untuk mengisi teks Visi, Misi, Sejarah, dan Prospek Karir.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Sejarah Singkat <span class="text-red-500">*</span></label>
                        <textarea name="sejarah" rows="5" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Visi <span class="text-red-500">*</span></label>
                            <textarea name="visi" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Misi <span class="text-red-500">*</span></label>
                            <textarea name="misi" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required></textarea>
                        </div>
                    </div>

                    <div class="hidden"> <label class="block text-sm font-bold text-gray-700 mb-2">Tujuan</label>
                        <textarea name="tujuan" rows="2" class="w-full p-3 border border-gray-300 rounded-lg">-</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Prospek Karir <span class="text-red-500">*</span></label>
                        <textarea name="prospek_karir" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>
                </div>

                <div id="konten-struktur" class="hidden space-y-6">
                    <div class="bg-green-50 p-4 rounded-lg mb-4 border border-green-100">
                        <p class="text-sm text-green-800 font-semibold">Bagian ini khusus mengunggah gambar bagan struktur organisasi.</p>
                    </div>

                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center bg-gray-50">
                        <svg class="w-16 h-16 mx-auto text-blue-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        
                        <div class="w-full max-w-md mx-auto">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Pilih File Gambar Bagan</label>
                            <input type="file" name="struktur_organisasi" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200 cursor-pointer border border-gray-300 rounded-md bg-white">
                            <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG, JPEG. Maksimal 2MB.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-10 pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition transform hover:-translate-y-0.5">
                        Simpan Data Profil
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    function switchTab(tab) {
        // Sembunyikan semua konten
        document.getElementById('konten-teks').classList.add('hidden');
        document.getElementById('konten-struktur').classList.add('hidden');
        
        // Reset warna tab
        document.getElementById('tab-teks').classList.remove('border-blue-600', 'text-blue-600');
        document.getElementById('tab-teks').classList.add('border-transparent', 'text-gray-500');
        
        document.getElementById('tab-struktur').classList.remove('border-blue-600', 'text-blue-600');
        document.getElementById('tab-struktur').classList.add('border-transparent', 'text-gray-500');

        // Tampilkan yang aktif
        document.getElementById('konten-' + tab).classList.remove('hidden');
        document.getElementById('tab-' + tab).classList.add('border-blue-600', 'text-blue-600');
        document.getElementById('tab-' + tab).classList.remove('border-transparent', 'text-gray-500');
    }
</script>
@endsection