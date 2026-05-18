@extends('layouts.admin.admin')

@section('title', 'Tambah Tenaga Pendidik Baru - Admin Bioteknologi IT Del')

@section('content')
<div class="py-16 min-h-screen bg-gray-50/50">
    <div class="container mx-auto px-6">
        
        <div class="mb-12">
            <h1 class="text-4xl font-extrabold text-biotech-primary uppercase tracking-wider mb-2">Manajemen Tenaga Pendidik</h1>
            <div class="h-1.5 w-24 bg-biotech-secondary rounded"></div>
            <p class="mt-4 text-gray-600 max-w-2xl">Lengkapi formulir di bawah ini untuk menambahkan data tenaga pendidik baru ke dalam sistem.</p>
        </div>

        <div class="bg-white p-10 rounded-2xl shadow-xl border border-gray-100">
            
            <h2 class="text-2xl font-bold text-gray-800 mb-8 pb-4 border-b border-gray-100">Formulir Tambah Tenaga Pendidik</h2>

            <form action="{{ route('tenaga-pendidik.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">
                    
                    <div class="md:col-span-2">
                        <h3 class="text-lg font-semibold text-biotech-primary mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Informasi Dasar
                        </h3>
                    </div>
                    
                    <div>
                        <label for="nidn" class="block text-sm font-semibold text-gray-600 mb-2">NIDN / NIK</label>
                        <input type="text" name="nidn" id="nidn" placeholder="Contoh: 0012345678" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-biotech-secondary/50 focus:border-biotech-secondary transition" required>
                    </div>
                    
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-600 mb-2">Nama Lengkap & Gelar</label>
                        <input type="text" name="nama" id="nama" placeholder="Contoh: Dr. Eng. John Doe, M.T." class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-biotech-secondary/50 focus:border-biotech-secondary transition" required>
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <h3 class="text-lg font-semibold text-biotech-primary mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                            Informasi Posisi & Pendidikan
                        </h3>
                    </div>

                    <div>
                        <label for="jabatan" class="block text-sm font-semibold text-gray-600 mb-2">Posisi (Jabatan)</label>
                        <input type="text" name="jabatan" id="jabatan" placeholder="Contoh: Dosen Pengajar / Asisten Ahli" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-biotech-secondary/50 focus:border-biotech-secondary transition" required>
                    </div>

                    <div>
                        <label for="lulusan" class="block text-sm font-semibold text-gray-600 mb-2">Latar Belakang Pendidikan</label>
                        <input type="text" name="lulusan" id="lulusan" placeholder="Contoh: S1 IT Del, S2 ITB, S3 Tohoku Univ." class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-biotech-secondary/50 focus:border-biotech-secondary transition" required>
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <h3 class="text-lg font-semibold text-biotech-primary mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Kontak & Lokasi
                        </h3>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-600 mb-2">Email Resmi</label>
                        <input type="email" name="email" id="email" placeholder="Contoh: john.doe@del.ac.id" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-biotech-secondary/50 focus:border-biotech-secondary transition" required>
                    </div>

                    <div>
                        <label for="no_telpon" class="block text-sm font-semibold text-gray-600 mb-2">No. Telpon / WhatsApp</label>
                        <input type="text" name="no_telpon" id="no_telpon" placeholder="Contoh: 081234567890" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-biotech-secondary/50 focus:border-biotech-secondary transition">
                    </div>

                    <div class="md:col-span-2">
                        <label for="ruangan" class="block text-sm font-semibold text-gray-600 mb-2">Kantor (Ruangan)</label>
                        <input type="text" name="ruangan" id="ruangan" placeholder="Contoh: Gedung 1, Lantai 2, R. Biotek" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-biotech-secondary/50 focus:border-biotech-secondary transition" required>
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <h3 class="text-lg font-semibold text-biotech-primary mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Media Foto
                        </h3>
                    </div>

                    <div class="md:col-span-2">
                        <label for="foto" class="block text-sm font-semibold text-gray-600 mb-2">Upload Foto (Opsional)</label>
                        <div class="relative group">
                            <input type="file" name="foto" id="foto" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-biotech-primary/10 file:text-biotech-primary hover:file:bg-biotech-primary/20 transition cursor-pointer">
                        </div>
                        <p class="mt-2 text-xs text-gray-500">Format yang diterima: JPG, JPEG, PNG. Ukuran maksimum: 2MB. Disarankan foto berasio 3:4 atau persegi.</p>
                    </div>

                    <div class="mt-10 pt-6 border-t border-gray-200">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">Daftar Mata Kuliah yang Diampu</h3>
                                <p class="text-xs text-gray-500 font-semibold">Masukkan daftar mata kuliah yang diajarkan oleh tenaga pendidik ini.</p>
                            </div>
                            <button type="button" id="btn-tambah-pengajaran" class="bg-green-600 hover:bg-green-700 text-white text-xs font-bold py-2 px-4 rounded-lg shadow transition">
                                + Tambah Mata Kuliah
                            </button>
                        </div>
                    
                        <div class="overflow-x-auto shadow border border-gray-200 rounded-xl bg-white p-4">
                            <table class="min-w-full divide-y divide-gray-200" id="tabel-pengajaran">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase">Mata Kuliah</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase">Semester</th>
                                        <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase">Tahun Akademik</th>
                                        <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase" style="width: 80px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200" id="wrapper-pengajaran">
                                    @if(isset($tenagaPendidik) && $tenagaPendidik->pengajarans->count() > 0)
                                        @foreach($tenagaPendidik->pengajarans as $index => $ajar)
                                            <tr>
                                                <td class="p-2">
                                                    <input type="text" name="mata_kuliah[]" value="{{ $ajar->mata_kuliah }}" required class="w-full px-3 py-2 border rounded-lg text-sm outline-none focus:ring-2 focus:ring-blue-500">
                                                </td>
                                                <td class="p-2">
                                                    <select name="semester[]" required class="w-full px-3 py-2 border rounded-lg text-sm outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                                                        <option value="Ganjil" {{ $ajar->semester == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                                                        <option value="Genap" {{ $ajar->semester == 'Genap' ? 'selected' : '' }}>Genap</option>
                                                    </select>
                                                </td>
                                                <td class="p-2">
                                                    <input type="text" name="tahun_akademik[]" value="{{ $ajar->tahun_akademik }}" placeholder="Contoh: 2025/2026" required class="w-full px-3 py-2 border rounded-lg text-sm outline-none focus:ring-2 focus:ring-blue-500">
                                                </td>
                                                <td class="p-2 text-center">
                                                    <button type="button" class="btn-hapus-baris bg-red-100 hover:bg-red-200 text-red-600 p-2 rounded-lg transition">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="p-2">
                                                <input type="text" name="mata_kuliah[]" required placeholder="Nama Mata Kuliah" class="w-full px-3 py-2 border rounded-lg text-sm outline-none focus:ring-2 focus:ring-blue-500">
                                            </td>
                                            <td class="p-2">
                                                <select name="semester[]" required class="w-full px-3 py-2 border rounded-lg text-sm outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                                                    <option value="Ganjil">Ganjil</option>
                                                    <option value="Genap">Genap</option>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="text" name="tahun_akademik[]" required placeholder="Contoh: 2025/2026" class="w-full px-3 py-2 border rounded-lg text-sm outline-none focus:ring-2 focus:ring-blue-500">
                                            </td>
                                            <td class="p-2 text-center">
                                                <button type="button" class="btn-hapus-baris bg-red-100 hover:bg-red-200 text-red-600 p-2 rounded-lg transition">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const wrapper = document.getElementById('wrapper-pengajaran');
                            const btnTambah = document.getElementById('btn-tambah-pengajaran');
                    
                            // Template HTML untuk baris baru saat tombol diklik
                            const barisBaru = `
                                <tr>
                                    <td class="p-2">
                                        <input type="text" name="mata_kuliah[]" required placeholder="Nama Mata Kuliah" class="w-full px-3 py-2 border rounded-lg text-sm outline-none focus:ring-2 focus:ring-blue-500">
                                    </td>
                                    <td class="p-2">
                                        <select name="semester[]" required class="w-full px-3 py-2 border rounded-lg text-sm outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                                            <option value="Ganjil">Ganjil</option>
                                            <option value="Genap">Genap</option>
                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="text" name="tahun_akademik[]" required placeholder="Contoh: 2025/2026" class="w-full px-3 py-2 border rounded-lg text-sm outline-none focus:ring-2 focus:ring-blue-500">
                                    </td>
                                    <td class="p-2 text-center">
                                        <button type="button" class="btn-hapus-baris bg-red-100 hover:bg-red-200 text-red-600 p-2 rounded-lg transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </td>
                                </tr>
                            `;
                    
                            // Aksi Tambah Baris
                            btnTambah.addEventListener('click', function() {
                                wrapper.insertAdjacentHTML('beforeend', barisBaru);
                            });
                    
                            // Aksi Hapus Baris (Menggunakan Event Delegation karena baris dibuat dinamis)
                            wrapper.addEventListener('click', function(e) {
                                if (e.target.closest('.btn-hapus-baris')) {
                                    const baris = e.target.closest('tr');
                                    // Sisakan minimal 1 baris input agar form tidak kosong total
                                    if (wrapper.querySelectorAll('tr').length > 1) {
                                        baris.remove();
                                    } else {
                                        alert('Harus ada minimal satu mata kuliah yang diisi.');
                                    }
                                }
                            });
                        });
                    </script>

                </div>

                <div class="flex justify-end items-center gap-4 mt-16 pt-8 border-t border-gray-100">
                    <a href="{{ route('tenaga-pendidik.index') }}" class="text-gray-600 hover:text-biotech-primary transition font-medium text-sm px-6 py-2.5 rounded-lg">Batal</a>
                    <button type="submit" class="bg-biotech-secondary text-white px-10 py-3 rounded-xl hover:bg-biotech-primary transition font-semibold shadow-lg text-sm flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection