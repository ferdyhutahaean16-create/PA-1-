@extends('layouts.admin.admin')

@section('title', 'Edit Data Tenaga Pendidik - Admin Bioteknologi')

@section('content')
<div class="py-16 min-h-screen bg-gray-50/50">
    <div class="container mx-auto px-6">
        
        <div class="mb-12 flex items-center gap-4">
            <a href="{{ route('lecturer.index') }}" class="text-emerald-600 hover:text-emerald-500 flex items-center gap-2 mb-4 font-semibold">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Edit Data Tenaga Pendidik</h1>
                <div class="h-1.5 w-24 bg-yellow-500 rounded mt-1"></div>
            </div>
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
        
        <form action="{{ route('lecturer.update', $lecturer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- ============================================== --}}
            {{-- KOTAK 1: FORM EDIT BIODATA UTAMA               --}}
            {{-- ============================================== --}}
            <div class="bg-white p-10 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-yellow-500 mb-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-8 pb-4 border-b border-gray-100">Update Biodata: <span class="text-emerald-700">{{ $lecturer->name }}</span></h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">
                    
                    <div class="md:col-span-2">
                        <h3 class="text-lg font-semibold text-emerald-700 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Informasi Dasar
                        </h3>
                    </div>
                    
                    <div>
                        <label for="nidn" class="block text-sm font-semibold text-gray-600 mb-2">NIDN / NIK <span class="text-red-500">*</span></label>
                        <input type="text" name="nidn" id="nidn" value="{{ old('nidn', $lecturer->nidn) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>
                    
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-600 mb-2">Nama Lengkap & Gelar <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', $lecturer->name) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <h3 class="text-lg font-semibold text-emerald-700 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                            Informasi Posisi & Pendidikan
                        </h3>
                    </div>

                    <div>
                        <label for="position" class="block text-sm font-semibold text-gray-600 mb-2">Posisi (Jabatan) <span class="text-red-500">*</span></label>
                        <input type="text" name="position" id="position" value="{{ old('position', $lecturer->position) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>

                    <div>
                        <label for="education" class="block text-sm font-semibold text-gray-600 mb-2">Latar Belakang Pendidikan <span class="text-red-500">*</span></label>
                        <input type="text" name="education" id="education" value="{{ old('education', $lecturer->education) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <h3 class="text-lg font-semibold text-emerald-700 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Kontak & Lokasi
                        </h3>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-600 mb-2">Email Resmi <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" value="{{ old('email', $lecturer->email) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Link Profil Google Scholar <span class="text-gray-400 font-normal">(Opsional)</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path></svg>
                            </div>
                            <input type="url" name="link_scholar" value="{{ old('link_scholar', $lecturer->link_scholar ?? '') }}" placeholder="Contoh: https://scholar.google.co.id/..." class="w-full pl-10 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                    </div>

                    <div>
                        <label for="phone_number" class="block text-sm font-semibold text-gray-600 mb-2">No. Telpon / WhatsApp</label>
                        <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $lecturer->phone_number) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition">
                    </div>

                    <div>
                        <label for="office_room" class="block text-sm font-semibold text-gray-600 mb-2">Kantor (Ruangan)</label>
                        <input type="text" name="office_room" id="office_room" value="{{ old('office_room', $lecturer->office_room) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition">
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <h3 class="text-lg font-semibold text-emerald-700 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Media Foto
                        </h3>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-600 mb-3">Foto Saat Ini</label>
                        @if($lecturer->photo)
                            <div class="flex items-center gap-6 mb-6 p-4 bg-gray-50 rounded-xl border border-gray-100 inline-block">
                                <img src="{{ asset($lecturer->photo) }}" alt="Foto Lama" class="w-24 h-24 rounded-full object-cover shadow-md border-4 border-white">
                            </div>
                        @else
                            <div class="mb-6 p-4 bg-gray-50 rounded-xl border border-gray-100 inline-block text-sm text-gray-500">
                                Belum ada foto yang tersimpan.
                            </div>
                        @endif

                        <label for="photo" class="block text-sm font-semibold text-gray-600 mb-2">Upload Foto Baru (Opsional)</label>
                        <input type="file" name="photo" id="photo" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100 transition cursor-pointer border border-gray-200 rounded-xl bg-white">
                    </div>
                </div>
            </div>

            {{-- ============================================== --}}
            {{-- KOTAK 2: FORM DINAMIS MATA KULIAH                --}}
            {{-- ============================================== --}}
            <div class="bg-white p-10 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-emerald-600 mb-10">
                
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 border-b border-gray-100 pb-4 gap-4">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Kelola Riwayat Pengajaran Dosen</h3>
                        <p class="text-sm text-gray-500 mt-1">Susun daftar mata kuliah, lalu simpan bersamaan dengan biodata.</p>
                    </div>
                    <button type="button" id="btn-tambah-matkul" class="bg-emerald-100 text-emerald-700 px-5 py-2.5 rounded-lg text-sm font-bold hover:bg-emerald-200 transition flex items-center gap-2 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Tambah Baris Matkul
                    </button>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    {{-- Header Kolom --}}
                    <div class="hidden md:grid grid-cols-12 gap-4 mb-3 text-xs font-bold text-gray-500 uppercase tracking-wider px-2">
                        <div class="col-span-5">Mata Kuliah</div>
                        <div class="col-span-3">Semester</div>
                        <div class="col-span-3">Tahun Akademik</div>
                        <div class="col-span-1 text-center">Hapus</div>
                    </div>
                    
                    <div id="container-matkul" class="space-y-4">
                        {{-- Menampilkan Data Matkul Lama (Jika ada) --}}
                        @if($lecturer->teachings && $lecturer->teachings->count() > 0)
                            @foreach($lecturer->teachings as $ajar)
                                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center row-matkul bg-white p-3 rounded-xl border border-gray-200 shadow-sm">
                                    <div class="col-span-1 md:col-span-5">
                                        <input type="text" name="course_name[]" value="{{ $ajar->course_name }}" placeholder="Nama Mata Kuliah" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none" required>
                                    </div>
                                    <div class="col-span-1 md:col-span-3">
                                        <input type="text" name="semester[]" value="{{ $ajar->semester }}" placeholder="Ganjil / Genap" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                                    </div>
                                    <div class="col-span-1 md:col-span-3">
                                        <input type="text" name="academic_year[]" value="{{ $ajar->academic_year }}" placeholder="Contoh: 2025/2026" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                                    </div>
                                    <div class="col-span-1 md:col-span-1 text-center flex justify-center">
                                        <button type="button" class="btn-hapus-matkul bg-red-50 text-red-500 p-2.5 rounded-lg hover:bg-red-500 hover:text-white transition" title="Hapus Baris">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            {{-- Jika belum ada matkul sama sekali, beri 1 baris kosong --}}
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center row-matkul bg-white p-3 rounded-xl border border-gray-200 shadow-sm">
                                <div class="col-span-1 md:col-span-5">
                                    <input type="text" name="course_name[]" placeholder="Nama Mata Kuliah" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                                </div>
                                <div class="col-span-1 md:col-span-3">
                                    <input type="text" name="semester[]" placeholder="Ganjil / Genap" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                                </div>
                                <div class="col-span-1 md:col-span-3">
                                    <input type="text" name="academic_year[]" placeholder="Contoh: 2025/2026" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                                </div>
                                <div class="col-span-1 md:col-span-1 text-center flex justify-center">
                                    <button type="button" class="btn-hapus-matkul bg-red-50 text-red-500 p-2.5 rounded-lg hover:bg-red-500 hover:text-white transition" title="Hapus Baris">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- TOMBOL SUBMIT KESELURUHAN (Biodata + Pengajaran) --}}
                <div class="flex justify-end items-center gap-4 mt-10 pt-8 border-t border-gray-100">                    
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white px-10 py-3.5 rounded-xl transition font-bold shadow-lg text-sm flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- SCRIPT PENAMBAHAN BARIS DINAMIS --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnTambah = document.getElementById('btn-tambah-matkul');
        const container = document.getElementById('container-matkul');

        // Fungsi Tambah Baris
        btnTambah.addEventListener('click', function () {
            const row = document.createElement('div');
            row.className = 'grid grid-cols-1 md:grid-cols-12 gap-4 items-center row-matkul bg-white p-3 rounded-xl border border-gray-200 shadow-sm mt-3';
            row.innerHTML = `
                <div class="col-span-1 md:col-span-5">
                    <input type="text" name="course_name[]" placeholder="Nama Mata Kuliah" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
                <div class="col-span-1 md:col-span-3">
                    <input type="text" name="semester[]" placeholder="Ganjil / Genap" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
                <div class="col-span-1 md:col-span-3">
                    <input type="text" name="academic_year[]" placeholder="Contoh: 2025/2026" class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                </div>
                <div class="col-span-1 md:col-span-1 text-center flex justify-center">
                    <button type="button" class="btn-hapus-matkul bg-red-50 text-red-500 p-2.5 rounded-lg hover:bg-red-500 hover:text-white transition" title="Hapus Baris">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </div>
            `;
            container.appendChild(row);
        });

        // Fungsi Hapus Baris
        container.addEventListener('click', function (e) {
            if (e.target.closest('.btn-hapus-matkul')) {
                const baris = e.target.closest('.row-matkul');
                if (container.querySelectorAll('.row-matkul').length > 1) {
                    baris.remove();
                } else {
                    baris.querySelectorAll('input').forEach(input => input.value = '');
                }
            }
        });
    });
</script>
@endsection