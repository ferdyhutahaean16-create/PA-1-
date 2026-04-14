@extends('layouts.admin.admin')

@section('title', 'Tambah Tenaga Pendidik Baru - Admin Bioteknologi')

@section('content')
<div class="py-16 min-h-screen bg-gray-50/50">
    <div class="container mx-auto px-6">
        
        <div class="mb-12">
            <h1 class="text-4xl font-extrabold text-biotech-primary uppercase tracking-wider mb-2">Manajemen Tenaga Pendidik</h1>
            <div class="h-1.5 w-24 bg-yellow-500 rounded"></div>
            <p class="mt-4 text-gray-600 max-w-2xl">Lengkapi formulir di bawah ini untuk menambahkan data tenaga pendidik baru ke dalam sistem.</p>
        </div>

        <div class="bg-white p-10 rounded-2xl shadow-xl border border-gray-100">
            
            <h2 class="text-2xl font-bold text-gray-800 mb-8 pb-4 border-b border-gray-100">Formulir Tambah Tenaga Pendidik</h2>

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-8 rounded-r-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Gagal menyimpan data. Periksa kembali isian Anda:</h3>
                            <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('tenaga-pendidik.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">
                    
                    <div class="md:col-span-2">
                        <h3 class="text-lg font-semibold text-biotech-primary mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Informasi Dasar
                        </h3>
                    </div>
                    
                    <div>
                        <label for="nidn" class="block text-sm font-semibold text-gray-600 mb-2">NIDN / NIK</label>
                        <input type="text" name="nidn" id="nidn" value="{{ old('nidn') }}" placeholder="Contoh: 0012345678" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>
                    
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-600 mb-2">Nama Lengkap & Gelar</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Contoh: Dr. Eng. John Doe, M.T." class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <h3 class="text-lg font-semibold text-biotech-primary mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                            Informasi Posisi & Pendidikan
                        </h3>
                    </div>

                    <div>
                        <label for="jabatan" class="block text-sm font-semibold text-gray-600 mb-2">Posisi (Jabatan)</label>
                        <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan') }}" placeholder="Contoh: Dosen Pengajar / Asisten Ahli" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>

                    <div>
                        <label for="lulusan" class="block text-sm font-semibold text-gray-600 mb-2">Latar Belakang Pendidikan</label>
                        <input type="text" name="lulusan" id="lulusan" value="{{ old('lulusan') }}" placeholder="Contoh: S1 IT Del, S2 ITB, S3 Tohoku Univ." class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <h3 class="text-lg font-semibold text-biotech-primary mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Kontak & Lokasi
                        </h3>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-600 mb-2">Email Resmi</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Contoh: john.doe@del.ac.id" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>

                    <div>
                        <label for="no_telpon" class="block text-sm font-semibold text-gray-600 mb-2">No. Telpon / WhatsApp</label>
                        <input type="text" name="no_telpon" id="no_telpon" value="{{ old('no_telpon') }}" placeholder="Contoh: 081234567890" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition">
                    </div>

                    <div class="md:col-span-2">
                        <label for="ruangan" class="block text-sm font-semibold text-gray-600 mb-2">Kantor (Ruangan)</label>
                        <input type="text" name="ruangan" id="ruangan" value="{{ old('ruangan') }}" placeholder="Contoh: Gedung 1, Lantai 2, R. Biotek" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <h3 class="text-lg font-semibold text-biotech-primary mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Media Foto
                        </h3>
                    </div>

                    <div class="md:col-span-2">
                        <label for="foto" class="block text-sm font-semibold text-gray-600 mb-2">Upload Foto (Opsional)</label>
                        <div class="relative group">
                            <input type="file" name="foto" id="foto" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100 transition cursor-pointer">
                        </div>
                        <p class="mt-2 text-xs text-gray-500">Format yang diterima: JPG, JPEG, PNG. Ukuran maksimum: 2MB.</p>
                    </div>

                </div>

                <div class="flex justify-end items-center gap-4 mt-16 pt-8 border-t border-gray-100">
                    <a href="{{ route('tenaga-pendidik.index') }}" class="text-gray-600 hover:text-biotech-primary transition font-medium text-sm px-6 py-2.5 rounded-lg">Batal</a>
                    
                    <button type="submit" class="bg-yellow-500 text-white px-10 py-3 rounded-xl hover:bg-yellow-600 transition font-bold shadow-lg text-sm flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection