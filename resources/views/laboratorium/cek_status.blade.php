@extends('layouts.main')

@section('title', 'Cek Status Peminjaman')

@section('content')
<div class="bg-gray-50 py-10 border-b border-gray-200">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-3xl font-bold text-[#1a4a38] mb-2 uppercase tracking-wide">Lacak Permohonan</h1>
        <p class="text-gray-600">Cek status persetujuan peminjaman alat atau bahan Anda.</p>
    </div>
</div>

<div class="container mx-auto px-6 py-12 max-w-6xl min-h-screen">
    
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200 mb-8 max-w-2xl mx-auto text-center">
        <form action="{{ route('lab.cek-status') }}" method="GET" class="flex flex-col md:flex-row gap-4 justify-center items-center">
            <input type="text" name="nim" value="{{ $nim }}" placeholder="Masukkan NIM Anda..." class="w-full md:w-2/3 border-gray-300 rounded-xl shadow-sm focus:ring-[#1a4a38] focus:border-[#1a4a38] px-4 py-3" required>
            <button type="submit" class="w-full md:w-auto bg-[#1a4a38] text-white px-8 py-3 rounded-xl font-bold shadow hover:bg-green-800 transition">
                Cari Riwayat
            </button>
        </form>
    </div>

    @if($nim)
        <div class="mb-4 flex justify-between items-end">
            <h2 class="text-xl font-bold text-gray-800">Hasil Pencarian untuk NIM: <span class="text-[#1a4a38]">{{ $nim }}</span></h2>
        </div>

        @if($peminjamans->isEmpty())
            <div class="bg-yellow-50 text-yellow-700 p-6 rounded-xl border border-yellow-200 text-center">
                Belum ada riwayat peminjaman yang ditemukan untuk NIM tersebut. Pastikan NIM yang dimasukkan benar.
            </div>
        @else
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                            <tr>
                                <th class="p-4">Tanggal Diajukan</th>
                                <th class="p-4">Formulir</th>
                                <th class="p-4">Judul Penelitian</th>
                                <th class="p-4">Status</th>
                                <th class="p-4">Catatan Admin</th>
                                <th class="p-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($peminjamans as $p)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4 text-sm text-gray-600">{{ $p->created_at->format('d M Y, H:i') }}</td>
                                <td class="p-4">
                                    <span class="px-2 py-1 rounded text-xs font-bold {{ $p->jenis_form == 'Alat' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">
                                        Pinjam {{ $p->jenis_form }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <div class="font-bold text-gray-800">{{ $p->judul_penelitian }}</div>
                                    <div class="text-xs text-gray-500">{{ $p->laboratorium }}</div>
                                </td>
                                <td class="p-4">
                                    @php
                                        $color = 'bg-yellow-100 text-yellow-700';
                                        $icon = 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z';
                                        if($p->status == 'Disetujui') { $color = 'bg-green-100 text-green-700'; $icon = 'M5 13l4 4L19 7'; }
                                        if($p->status == 'Ditolak') { $color = 'bg-red-100 text-red-700'; $icon = 'M6 18L18 6M6 6l12 12'; }
                                    @endphp
                                    <span class="px-3 py-1.5 rounded-full text-xs font-bold flex items-center w-fit gap-1 {{ $color }}">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"></path></svg>
                                        {{ $p->status }}
                                    </span>
                                </td>
                                <td class="p-4 text-sm text-gray-600 italic">
                                    {{ $p->catatan_admin ?? '-' }}
                                </td>
                                
                                <td class="p-4 text-center">
                                    @if($p->status == 'Disetujui')
                                        <a href="{{ route('lab.peminjaman.cetak', $p->id) }}" target="_blank" class="inline-flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-3 py-2 rounded-lg shadow-sm transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2z"></path></svg>
                                            Unduh Bon
                                        </a>
                                    @else
                                        <span class="text-xs text-gray-400 italic">Belum Tersedia</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endif
</div>
@endsection