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
                            <td class="p-4">
                                <span class="px-2 py-1 rounded text-xs font-bold {{ $p->jenis_form == 'Alat' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">
                                    {{ $p->jenis_form }}
                                </span>
                            </td>
                            <td class="p-4">
                                <ul class="text-xs list-disc ml-4">
                                    @if($p->jenis_form == 'Alat')
                                        @foreach($p->detailAlat as $alat)
                                            <li>{{ $alat->nama_alat }} ({{ $alat->jumlah }})</li>
                                        @endforeach
                                    @else
                                        @foreach($p->detailBahan as $bahan)
                                            <li>{{ $bahan->nama_bahan }} ({{ $bahan->jumlah }})</li>
                                        @endforeach
                                    @endif
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
                                <div class="flex justify-center gap-2">
                                    <form action="{{ route('admin.peminjaman.update', $p->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="Disetujui">
                                        <button class="bg-green-600 hover:bg-green-700 text-white text-xs px-3 py-1.5 rounded transition">Approve</button>
                                    </form>

                                    <button onclick="toggleRejectForm({{ $p->id }})" class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1.5 rounded transition">Reject</button>
                                </div>
                                
                                <div id="form-reject-{{ $p->id }}" class="hidden mt-2">
                                    <form action="{{ route('admin.peminjaman.update', $p->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="Ditolak">
                                        <input type="text" name="catatan_admin" placeholder="Alasan ditolak..." class="text-xs border-gray-300 rounded mb-1 w-full" required>
                                        <button class="bg-gray-800 text-white text-[10px] w-full py-1 rounded">Kirim Penolakan</button>
                                    </form>
                                </div>

                                @elseif($p->status == 'Disetujui')
                                    <a href="{{ route('admin.peminjaman.cetak', $p->id) }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-4 py-2 rounded-full font-bold shadow transition inline-flex items-center justify-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2z"></path></svg>
                                        Cetak PDF
                                    </a>
                                @elseif($p->status == 'Ditolak')
                                    <span class="text-xs text-red-500 font-bold italic">Ditolak</span>
                                @else
                                    <span class="text-xs text-gray-400 italic">Selesai</span>
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