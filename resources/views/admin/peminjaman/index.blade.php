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
                            <td class="p-4 align-top">
                                <div class="text-[11px] text-gray-400 mb-2">Form: <span class="font-bold text-gray-800">{{ $p->created_at->format('d/m/Y') }}</span></div>
                                
                                @if($p->rencana_pinjam && $p->rencana_kembali)
                                <div class="flex flex-col gap-1">
                                    <span class="bg-blue-50 text-blue-700 text-[9px] font-bold px-2 py-1 rounded whitespace-nowrap border border-blue-100 flex justify-between">
                                        <span>Pinjam:</span> <span>{{ \Carbon\Carbon::parse($p->rencana_pinjam)->format('d/m/y') }}</span>
                                    </span>
                                    <span class="bg-orange-50 text-orange-700 text-[9px] font-bold px-2 py-1 rounded whitespace-nowrap border border-orange-100 flex justify-between">
                                        <span>Kembali:</span> <span>{{ \Carbon\Carbon::parse($p->rencana_kembali)->format('d/m/y') }}</span>
                                    </span>
                                </div>
                                @endif
                            </td>
                            <td class="p-4">
                                <div class="font-bold">{{ $p->nama_peminjam }}</div>
                                {{-- 💡 Diubah dari $p->prodi menjadi $p->program_studi agar data terbaca dari database --}}
                                <div class="text-xs text-gray-400">{{ $p->nim }} - {{ $p->program_studi }}</div>
                            </td>
                            <td class="p-4">
                                @php
                                    $jenis = $p->kategori_peminjaman ?? '-';
                                @endphp
                                <span class="px-2 py-1 rounded text-xs font-bold {{ $jenis == 'Bahan' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                                    {{ $jenis }}
                                </span>
                            </td>

                            <td class="p-4">
                                <ul class="text-xs list-disc ml-4">
                                    @foreach($p->detailAlat as $alat)
                                        <li>{{ $alat->nama_alat }} ({{ $alat->jumlah }})</li>
                                    @endforeach

                                    @foreach($p->detailBahan as $bahan)
                                        <li>{{ $bahan->nama_bahan }} ({{ $bahan->jumlah }})</li>
                                    @endforeach
                                </ul>
                            </td>
                            
                            <td class="p-4">
                                @php
                                    $color = 'bg-yellow-100 text-yellow-700'; // Default: Pending
                                    $pulse = '';
                                    $text = $p->status;

                                    if($p->status == 'Disetujui') {
                                        if (str_contains((string)$p->catatan_admin, '[MENUNGGU_VALIDASI_KEMBALI]')) {
                                            $color = 'bg-orange-100 text-orange-800 border border-orange-300';
                                            $pulse = 'animate-pulse';
                                            $text = 'Perlu Cek'; 
                                        } else {
                                            $color = 'bg-green-100 text-green-700';
                                        }
                                    }
                                    
                                    if($p->status == 'Ditolak') $color = 'bg-red-100 text-red-700';
                                    if($p->status == 'Selesai') $color = 'bg-indigo-100 text-indigo-700';
                                @endphp
                                <span class="px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $color }} {{ $pulse }} whitespace-nowrap">
                                    {{ $text }}
                                </span>
                            </td>

                            <td class="p-4 text-center">
                                @if($p->status == 'Pending')
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
                                    
                                    <div id="form-reject-{{ $p->id }}" class="hidden mt-2">
                                        <form action="{{ route('admin.peminjaman.update', $p->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="Ditolak">
                                            <textarea name="catatan_admin" placeholder="Alasan ditolak..." class="text-[10px] border border-gray-300 rounded p-1 mb-1 w-full h-12 outline-none focus:border-red-500" required></textarea>
                                            <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white text-[10px] w-full py-1.5 rounded font-bold shadow transition">Kirim Penolakan</button>
                                        </form>
                                    </div>
                            
                                @elseif($p->status == 'Disetujui')
                                    <div class="flex flex-col gap-2">
                                        <a href="{{ route('admin.peminjaman.cetak', $p->id) }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white text-[11px] px-3 py-1.5 rounded-full font-bold shadow transition flex items-center justify-center gap-1 w-full">
                                            Cetak Form PDF
                                        </a>
                                        
                                        <form action="{{ route('admin.peminjaman.update', $p->id) }}" method="POST" class="w-full">
                                            @csrf
                                            <input type="hidden" name="status" value="Selesai">
                                            <input type="hidden" name="tanggal_dikembalikan" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                            
                                            <button type="submit" onclick="return confirm('Apakah fisik barang sudah dikembalikan ke Lab dengan kondisi baik?')" 
                                                    class="bg-orange-500 hover:bg-orange-600 text-white text-[11px] px-3 py-1.5 rounded-full font-bold shadow transition w-full border-2 border-orange-300">
                                                Terima Pengembalian
                                            </button>
                                        </form>
                                    </div>
                            
                                @elseif($p->status == 'Selesai')
                                    <a href="{{ route('admin.peminjaman.cetak', $p->id) }}" target="_blank" class="bg-indigo-600 hover:bg-indigo-700 text-white text-[11px] px-3 py-1.5 rounded-full font-bold shadow transition flex items-center justify-center gap-1 w-full">
                                        Arsip Form PDF
                                    </a>
                            
                                @else
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