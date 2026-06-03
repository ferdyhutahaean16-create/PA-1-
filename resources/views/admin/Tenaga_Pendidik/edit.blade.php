@extends('layouts.admin.admin')

@section('title', 'Edit Data Tenaga Pendidik - Admin Bioteknologi')

@section('content')
<div class="py-16 min-h-screen bg-gray-50/50">
    <div class="container mx-auto px-6">
        
        <div class="mb-12 flex items-center gap-4">
            <a href="{{ route('tenaga-pendidik.index') }}" class="text-gray-400 hover:text-emerald-700 transition p-2 bg-white rounded-full shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
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

        <div class="bg-white p-10 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-yellow-500 mb-10">
            
            <h2 class="text-2xl font-bold text-gray-800 mb-8 pb-4 border-b border-gray-100">Update Biodata: <span class="text-emerald-700">{{ $tenaga_pendidik->nama }}</span></h2>

            <form action="{{ route('tenaga-pendidik.update', $tenaga_pendidik->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">
                    
                    <div class="md:col-span-2">
                        <h3 class="text-lg font-semibold text-emerald-700 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Informasi Dasar
                        </h3>
                    </div>
                    
                    <div>
                        <label for="nidn" class="block text-sm font-semibold text-gray-600 mb-2">NIDN / NIK <span class="text-red-500">*</span></label>
                        <input type="text" name="nidn" id="nidn" value="{{ old('nidn', $tenaga_pendidik->nidn) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>
                    
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-600 mb-2">Nama Lengkap & Gelar <span class="text-red-500">*</span></label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $tenaga_pendidik->nama) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <h3 class="text-lg font-semibold text-emerald-700 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                            Informasi Posisi & Pendidikan
                        </h3>
                    </div>

                    <div>
                        <label for="jabatan" class="block text-sm font-semibold text-gray-600 mb-2">Posisi (Jabatan) <span class="text-red-500">*</span></label>
                        <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $tenaga_pendidik->jabatan) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>

                    <div>
                        <label for="lulusan" class="block text-sm font-semibold text-gray-600 mb-2">Latar Belakang Pendidikan <span class="text-red-500">*</span></label>
                        <input type="text" name="lulusan" id="lulusan" value="{{ old('lulusan', $tenaga_pendidik->lulusan) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <h3 class="text-lg font-semibold text-emerald-700 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Kontak & Lokasi
                        </h3>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-600 mb-2">Email Resmi <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" value="{{ old('email', $tenaga_pendidik->email) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition" required>
                    </div>

                    {{-- Input Link Google Scholar --}}
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            Link Profil Google Scholar <span class="text-gray-400 font-normal">(Opsional)</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                {{-- Ikon Toga/Akademik kecil di dalam kotak input --}}
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                            </div>
                            <input type="url" name="link_scholar" value="{{ old('link_scholar', $tenaga_pendidik->link_scholar ?? '') }}" placeholder="Contoh: https://scholar.google.co.id/citations?user=..." class="w-full pl-10 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                        <p class="text-xs text-gray-500 mt-2">Masukkan URL lengkap profil Google Scholar dosen untuk menampilkan tombol Bidang Minat Penelitian.</p>
                    </div>

                    <div>
                        <label for="no_telpon" class="block text-sm font-semibold text-gray-600 mb-2">No. Telpon / WhatsApp</label>
                        <input type="text" name="no_telpon" id="no_telpon" value="{{ old('no_telpon', $tenaga_pendidik->no_telpon) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition">
                    </div>

                    <div class="md:col-span-2">
                        <label for="ruangan" class="block text-sm font-semibold text-gray-600 mb-2">Kantor (Ruangan)</label>
                        <input type="text" name="ruangan" id="ruangan" value="{{ old('ruangan', $tenaga_pendidik->ruangan) }}" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500 transition">
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <h3 class="text-lg font-semibold text-emerald-700 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Media Foto
                        </h3>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-600 mb-3">Foto Saat Ini</label>
                        
                        @if($tenaga_pendidik->foto)
                            <div class="flex items-center gap-6 mb-6 p-4 bg-gray-50 rounded-xl border border-gray-100 inline-block">
                                <img src="{{ asset($tenaga_pendidik->foto) }}" alt="Foto Lama" class="w-24 h-24 rounded-full object-cover shadow-md border-4 border-white">
                                <div>
                                    <p class="text-sm font-bold text-gray-700">Foto Tersimpan</p>
                                    <p class="text-xs text-gray-500">Anda tidak perlu upload ulang jika tidak ingin mengganti foto ini.</p>
                                </div>
                            </div>
                        @else
                            <div class="mb-6 p-4 bg-gray-50 rounded-xl border border-gray-100 inline-block text-sm text-gray-500">
                                Belum ada foto yang tersimpan.
                            </div>
                        @endif

                        <label for="foto" class="block text-sm font-semibold text-gray-600 mb-2">Upload Foto Baru (Opsional)</label>
                        <div class="relative group">
                            <input type="file" name="foto" id="foto" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100 transition cursor-pointer border border-gray-200 rounded-xl bg-white">
                        </div>
                        <p class="mt-2 text-xs text-gray-500">Format: JPG, JPEG, PNG. Maks: 2MB. Mengupload foto baru akan menimpa foto lama.</p>
                    </div>

                </div>

                <div class="flex justify-end items-center gap-4 mt-10 pt-8 border-t border-gray-100">
                    <a href="{{ route('tenaga-pendidik.index') }}" class="text-gray-600 hover:text-emerald-700 transition font-medium text-sm px-6 py-2.5 rounded-lg">Batal</a>
                    <button type="submit" class="bg-yellow-500 text-white px-10 py-3 rounded-xl hover:bg-yellow-600 transition font-bold shadow-lg text-sm flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        Update Biodata Dosen
                    </button>
                </div>
            </form>
            </div>

        <div class="bg-white p-10 rounded-2xl shadow-xl border border-gray-100 border-t-4 border-t-emerald-600 mt-10">
            <h3 class="text-xl font-bold text-gray-800 mb-6">Riwayat Pengajaran Dosen</h3>

            <form action="{{ route('pengajaran.store') }}" method="POST" class="flex flex-col md:flex-row gap-4 items-end mb-8 bg-emerald-50/50 p-6 rounded-xl border border-emerald-100">
                @csrf
                <input type="hidden" name="tenaga_pendidik_id" value="{{ $tenaga_pendidik->id }}">

                <div class="flex-1 w-full">
                    <label class="block text-xs font-bold text-emerald-800 mb-2 uppercase tracking-wider">Nama Mata Kuliah Baru</label>
                    <input type="text" name="mata_kuliah" placeholder="Contoh: Biologi Sel dan Molekuler" class="w-full text-sm p-3 border border-emerald-200 rounded-lg outline-none focus:ring-2 focus:ring-emerald-600 bg-white" required>
                </div>

                <div class="w-full md:w-auto">
                    <button type="submit" class="w-full md:w-auto bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold py-3 px-6 rounded-lg shadow-md transition flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Tambah
                    </button>
                </div>
            </form>

            <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">
                <table class="w-full text-left border-collapse text-sm">
                    <thead class="bg-gray-100 text-gray-700 font-bold uppercase text-[11px] tracking-wider">
                        <tr>
                            <th class="p-4 w-16 text-center">No</th>
                            <th class="p-4">Daftar Mata Kuliah Diampu</th>
                            <th class="p-4 text-center w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-gray-700 bg-white">
                        @forelse($tenaga_pendidik->pengajarans as $index => $ajar)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 text-center font-medium text-gray-500">{{ $index + 1 }}</td>
                            <td class="p-4 font-bold text-gray-900">{{ $ajar->mata_kuliah }}</td>
                            <td class="p-4 text-center">
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="p-8 text-center text-gray-400 italic text-sm">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-10 h-10 mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                    Belum ada mata kuliah yang didaftarkan.
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection