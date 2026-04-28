@extends('layouts.main')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'biotech-green': '#15803d',   // Hijau Utama
                    'biotech-light': '#f0fdf4',   // Hijau Muda Background
                    'biotech-accent': '#facc15',  // Kuning Aksen
                }
            }
        }
    }
</script>

<div class="bg-biotech-light min-h-screen py-10">
    <div class="max-w-5xl mx-auto px-4">
        
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-green-100 mb-10">
            <div class="bg-biotech-green p-8 text-white relative text-center">
                <div class="relative z-10 flex flex-col items-center gap-2">
                    <svg class="w-12 h-12 text-biotech-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    <h1 class="text-3xl font-extrabold uppercase tracking-widest">Form Peminjaman Laboratorium</h1>
                    <p class="text-sm opacity-90">Institut Teknologi Del - Departemen Bioteknologi</p>
                </div>
            </div>

            <div class="p-8">
                <div class="bg-amber-50 border-l-4 border-amber-500 p-4 mb-8 rounded-r-lg">
                    <p class="text-amber-800 text-sm font-medium">
                        <strong>Syarat Peminjaman:</strong> Pengajuan wajib dikirim minimal 24 jam sebelum waktu penggunaan.
                    </p>
                </div>

                <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @csrf
                    <div class="space-y-5">
                        <h3 class="text-lg font-bold text-biotech-green border-b-2 border-biotech-accent pb-1 w-fit">Identitas Peminjam</h3>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1">NAMA LENGKAP (SESUAI KTM)</label>
                            <input type="text" name="nama" class="w-full border-2 border-gray-100 rounded-xl p-3 focus:border-biotech-green outline-none" placeholder="Masukkan nama lengkap..." required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1">NIM</label>
                            <input type="text" name="nim" class="w-full border-2 border-gray-100 rounded-xl p-3 focus:border-biotech-green outline-none" placeholder="Contoh: 11S22001" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1">MATA KULIAH</label>
                            <input type="text" name="matkul" class="w-full border-2 border-gray-100 rounded-xl p-3 focus:border-biotech-green outline-none" value="{{ $lab['course'] }}" placeholder="Masukkan mata kuliah...">
                        </div>
                    </div>

                    <div class="space-y-5">
                        <h3 class="text-lg font-bold text-biotech-green border-b-2 border-biotech-accent pb-1 w-fit">Waktu & Keperluan</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-600 mb-1">TGL PINJAM</label>
                                <input type="date" name="tgl_pinjam" class="w-full border-2 border-gray-100 rounded-xl p-3" min="{{ $lab['min_date'] }}" value="{{ $lab['min_date'] }}" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-600 mb-1">TGL KEMBALI</label>
                                <input type="date" name="tgl_kembali" class="w-full border-2 border-gray-100 rounded-xl p-3" min="{{ $lab['min_date'] }}" required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-600 mb-1">ALASAN PEMINJAMAN</label>
                            <textarea name="alasan" rows="3" class="w-full border-2 border-gray-100 rounded-xl p-3 focus:border-biotech-green outline-none" placeholder="Jelaskan tujuan peminjaman..."></textarea>
                        </div>
                    </div>

                    <div class="md:col-span-2 pt-6 text-center">
                        <button type="submit" class="bg-biotech-green hover:bg-green-800 text-white font-bold py-4 px-12 rounded-full shadow-lg transition-all transform hover:scale-105">
                            Ajukan Peminjaman & Unduh PDF
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-8 border border-green-100">
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-biotech-green uppercase">Cek Status Pengajuan</h2>
                    <p class="text-gray-500 text-sm">Cari berdasarkan NIM untuk melihat progres persetujuan admin.</p>
                </div>
                <div class="relative w-full md:w-64">
                    <input type="text" id="searchNim" onkeyup="filterStatus()" placeholder="Cari NIM Anda..." class="w-full pl-10 pr-4 py-2 border-2 border-gray-100 rounded-full focus:border-biotech-green outline-none text-sm">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-green-50 text-biotech-green uppercase text-xs font-black">
                            <th class="p-4 border-b">NIM</th>
                            <th class="p-4 border-b">Mata Kuliah</th>
                            <th class="p-4 border-b">Tgl Pinjam</th>
                            <th class="p-4 border-b">Status</th>
                            <th class="p-4 border-b text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody id="statusTableBody">
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4 font-mono font-bold">11S22001</td>
                            <td class="p-4 text-sm text-gray-600">Praktikum Mikrobiologi</td>
                            <td class="p-4 text-sm">12 Apr 2026</td>
                            <td class="p-4">
                                <span class="bg-blue-100 text-blue-700 text-[10px] font-black px-3 py-1 rounded-full uppercase">Menunggu</span>
                            </td>
                            <td class="p-4 text-center">
                                <span class="text-gray-400 text-xs italic">Cetak tersedia jika disetujui</span>
                            </td>
                        </tr>
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4 font-mono font-bold">11S22045</td>
                            <td class="p-4 text-sm text-gray-600">Genetika Molekuler</td>
                            <td class="p-4 text-sm">10 Apr 2026</td>
                            <td class="p-4">
                                <span class="bg-green-100 text-green-700 text-[10px] font-black px-3 py-1 rounded-full uppercase">Disetujui</span>
                            </td>
                            <td class="p-4 text-center">
                                <button class="bg-biotech-green text-white text-[10px] px-3 py-1 rounded-md font-bold hover:bg-green-800">Cetak PDF</button>
                            </td>
                        </tr>
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4 font-mono font-bold">11S22032</td>
                            <td class="p-4 text-sm text-gray-600">Biologi Sel</td>
                            <td class="p-4 text-sm">08 Apr 2026</td>
                            <td class="p-4">
                                <span class="bg-red-100 text-red-700 text-[10px] font-black px-3 py-1 rounded-full uppercase">Ditolak</span>
                            </td>
                            <td class="p-4 text-center">
                                <span class="text-red-500 text-[10px] font-bold">Alasan: Syarat H-1 tidak terpenuhi</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi sederhana untuk mencari NIM di tabel
    function filterStatus() {
        let input = document.getElementById("searchNim");
        let filter = input.value.toUpperCase();
        let table = document.getElementById("statusTableBody");
        let tr = table.getElementsByTagName("tr");

        for (let i = 0; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                let txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection