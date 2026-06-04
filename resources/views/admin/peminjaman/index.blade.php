@extends('layouts.admin.admin')

@section('title', 'Manajemen Peminjaman Lab')

@section('content')
<div class="py-10 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-6">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Daftar Permohonan Lab</h1>
            <p class="text-gray-500">Kelola persetujuan peminjaman alat dan pengambilan bahan.</p>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-800 text-white text-sm uppercase">
                        <tr>
                            <th class="p-4">Tanggal</th>
                            <th class="p-4">Peminjam</th>
                            <th class="p-4">Jenis</th>
                            <th class="p-4">Detail Barang</th>
                            <th class="p-4">Status</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($peminjamans as $p)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 text-sm">{{ $p->created_at->format('d/m/Y') }}</td>
                            <td class="p-4">
                                <div class="font-bold">{{ $p->nama_peminjam }}</div>
                                <div class="text-xs text-gray-400">{{ $p->nim }} - {{ $p->prodi }}</div>
                            </td>
                            <!-- 1. Kolom Jenis (Mendukung laci lama dan baru) -->
                            <td class="p-4">
                                @php
                                    $jenis = $p->kategori_peminjaman ?? $p->jenis_form;
                                @endphp
                                <span class="px-2 py-1 rounded text-xs font-bold {{ $jenis == 'Bahan' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                                    {{ $jenis }}
                                </span>
                            </td>

                            <!-- 2. Kolom Detail Barang (Logika Cerdas Anti-Gagal) -->
                            <td class="p-4">
                                <ul class="text-xs list-disc ml-4">
                                    {{-- Tampilkan isi keranjang Alat (jika ada) --}}
                                    @foreach($p->detailAlat as $alat)
                                        <li>{{ $alat->nama_alat }} ({{ $alat->jumlah }})</li>
                                    @endforeach

                                    {{-- Tampilkan isi keranjang Bahan (jika ada) --}}
                                    @foreach($p->detailBahan as $bahan)
                                        <li>{{ $bahan->nama_bahan }} ({{ $bahan->jumlah }})</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="p-4">
                                @php
                                    $color = 'bg-yellow-100 text-yellow-700';
                                    if($p->status == 'Disetujui') $color = 'bg-green-100 text-green-700';
                                    if($p->status == 'Ditolak') $color = 'bg-red-100 text-red-700';
                                @endphp
                                <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase {{ $color }}">
                                    {{ $p->status }}
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                @if($p->status == 'Pending')
                                    <!-- FASE 1: Form Persetujuan Admin -->
                                    <div class="flex flex-col gap-2">
                                        <form action="{{ route('admin.peminjaman.update', $p->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="Disetujui">
                                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white text-[11px] px-3 py-1.5 rounded-full shadow transition w-full font-bold">
                                                Setujui Form
                                            </button>
                                        </form>

                                        <button onclick="toggleRejectForm({{ $p->id }})" class="bg-red-600 hover:bg-red-700 text-white text-[11px] px-3 py-1.5 rounded-full shadow transition w-full font-bold">
                                            Tolak Form
                                        </button>
                                    </div>
                                    
                                    <!-- Form Alasan Penolakan (Hidden by default) -->
                                    <div id="form-reject-{{ $p->id }}" class="hidden mt-2">
                                        <form action="{{ route('admin.peminjaman.update', $p->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="Ditolak">
                                            <textarea name="catatan_admin" placeholder="Alasan ditolak..." class="text-[10px] border border-gray-300 rounded p-1 mb-1 w-full h-12 outline-none focus:border-red-500" required></textarea>
                                            <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white text-[10px] w-full py-1.5 rounded font-bold shadow transition">Kirim Penolakan</button>
                                        </form>
                                    </div>

                                @elseif($p->status == 'Disetujui')
                                    <!-- FASE 2: Form Cetak & Form Pengembalian (Selesai) -->
                                    <div class="flex flex-col gap-2">
                                        <a href="{{ route('admin.peminjaman.cetak', $p->id) }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white text-[11px] px-3 py-1.5 rounded-full font-bold shadow transition flex items-center justify-center gap-1 w-full">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2z"></path></svg>
                                            Cetak Form PDF
                                        </a>
                                        
                                        <form action="{{ route('admin.peminjaman.update', $p->id) }}" method="POST" class="w-full">
                                            @csrf
                                            <input type="hidden" name="status" value="Selesai">
                                            <button type="submit" onclick="return confirm('Apakah mahasiswa sudah mengembalikan semua barang? Stok akan dipulihkan otomatis.')" class="bg-gray-600 hover:bg-gray-700 text-white text-[11px] px-3 py-1.5 rounded-full font-bold shadow transition w-full">
                                                Tandai Selesai
                                            </button>
                                        </form>
                                    </div>

                                @elseif($p->status == 'Selesai')
                                    <!-- FASE 3: Arsip Form PDF (Untuk yang sudah selesai) -->
                                    <a href="{{ route('admin.peminjaman.cetak', $p->id) }}" target="_blank" class="bg-indigo-600 hover:bg-indigo-700 text-white text-[11px] px-3 py-1.5 rounded-full font-bold shadow transition flex items-center justify-center gap-1 w-full">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        Arsip Form PDF
                                    </a>

                                @else
                                    <!-- FASE 4: Jika Ditolak -->
                                    <span class="text-[11px] text-red-500 font-bold italic tracking-wider">DITOLAK</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleRejectForm(id) {
        let el = document.getElementById('form-reject-' + id);
        el.classList.toggle('hidden');
    }
</script>
@endsection