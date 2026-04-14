<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bon Peminjaman - {{ $peminjaman->nama_peminjam }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Pengaturan khusus untuk mode Cetak (Print) */
        @media print {
            @page { size: A4; margin: 20mm; }
            body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
            .no-print { display: none; }
        }
        body { font-family: 'Times New Roman', Times, serif; background-color: #f3f4f6; }
        .kertas-a4 { background-color: white; width: 210mm; min-height: 297mm; margin: 20px auto; padding: 20mm; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body class="text-black">

    <div class="no-print text-center py-4 bg-gray-800 text-white">
        <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded-lg font-bold shadow-lg flex items-center justify-center gap-2 mx-auto">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
            Cetak Dokumen Ini
        </button>
        <p class="text-sm mt-2 text-gray-300">Gunakan ukuran kertas A4 pada pengaturan printer Anda.</p>
    </div>

    <div class="kertas-a4">
        
        <div class="flex items-center justify-center border-b-2 border-black pb-4 mb-6">
            <div class="w-20 h-20 bg-gray-200 border border-gray-400 flex items-center justify-center mr-6">
                <span class="text-xs text-center text-gray-500">Logo<br>Del</span>
            </div>
            <div class="text-center font-bold">
                <p class="text-lg">PROGRAM STUDI TEKNIK BIOPROSES / BIOTEKNOLOGI</p>
                <p class="text-lg">FAKULTAS BIOTEKNOLOGI</p>
                <p class="text-lg">INSTITUT TEKNOLOGI DEL</p>
            </div>
        </div>

        <h2 class="text-xl font-bold text-center underline mb-8 uppercase">
            BON PEMINJAMAN ALAT DAN PENGAMBILAN BAHAN
        </h2>

        <table class="w-full mb-6 text-sm">
            <tr><td class="w-48 py-1">1. Judul Penelitian</td><td class="w-4">:</td><td class="border-b border-dotted border-black">{{ $peminjaman->judul_penelitian }}</td></tr>
            <tr><td class="py-1">2. Laboratorium yang digunakan</td><td>:</td><td class="border-b border-dotted border-black">{{ $peminjaman->laboratorium }}</td></tr>
            <tr><td class="py-1">3. Nama Peminjam / Pengguna</td><td>:</td><td class="border-b border-dotted border-black">{{ $peminjaman->nama_peminjam }} / NIM. {{ $peminjaman->nim }}</td></tr>
            <tr><td class="py-1">4. Prodi / Instansi</td><td>:</td><td class="border-b border-dotted border-black">{{ $peminjaman->prodi }}</td></tr>
            <tr><td class="py-1">5. Daftar Barang yang Dipakai</td><td>:</td><td>({{ $peminjaman->jenis_form }})</td></tr>
        </table>

        <table class="w-full border-collapse border border-black mb-10 text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-black p-2 w-10">No.</th>
                    <th class="border border-black p-2">Nama Barang</th>
                    <th class="border border-black p-2 w-20">Jumlah</th>
                    @if($peminjaman->jenis_form == 'Alat')
                        <th class="border border-black p-2 w-32">Ukuran</th>
                        <th class="border border-black p-2 w-40">Ket. Sebelum</th>
                    @else
                        <th class="border border-black p-2 w-40">Harga</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @if($peminjaman->jenis_form == 'Alat')
                    @foreach($peminjaman->detailAlat as $index => $item)
                    <tr>
                        <td class="border border-black p-2 text-center">{{ $index + 1 }}</td>
                        <td class="border border-black p-2">{{ $item->nama_alat }}</td>
                        <td class="border border-black p-2 text-center">{{ $item->jumlah }}</td>
                        <td class="border border-black p-2 text-center">{{ $item->ukuran ?? '-' }}</td>
                        <td class="border border-black p-2">{{ $item->ket_sebelum ?? '-' }}</td>
                    </tr>
                    @endforeach
                @else
                    @foreach($peminjaman->detailBahan as $index => $item)
                    <tr>
                        <td class="border border-black p-2 text-center">{{ $index + 1 }}</td>
                        <td class="border border-black p-2">{{ $item->nama_bahan }}</td>
                        <td class="border border-black p-2 text-center">{{ $item->jumlah }}</td>
                        <td class="border border-black p-2 text-center">{{ $item->harga ?? '-' }}</td>
                    </tr>
                    @endforeach
                @endif
                
                @for($i = 0; $i < 5; $i++)
                <tr>
                    <td class="border border-black p-4"></td>
                    <td class="border border-black p-4"></td>
                    <td class="border border-black p-4"></td>
                    @if($peminjaman->jenis_form == 'Alat')
                        <td class="border border-black p-4"></td>
                        <td class="border border-black p-4"></td>
                    @else
                        <td class="border border-black p-4"></td>
                    @endif
                </tr>
                @endfor
            </tbody>
        </table>

        <div class="flex justify-between mt-12 text-sm">
            <div class="text-center">
                <p class="mb-20">Peminjam,</p>
                <p>( ..................................................... )</p>
                <p class="mt-8 mb-20">Ketua Peneliti,</p>
                <p>( ..................................................... )</p>
            </div>
            
            <div class="text-center">
                <p class="mb-20">Sitoluama, {{ \Carbon\Carbon::now()->format('d F Y') }}<br>Yang menyediakan,</p>
                <p>( ..................................................... )</p>
                <p class="mt-8 mb-20">Laboran,</p>
                <p>( ..................................................... )</p>
            </div>
        </div>

    </div>
</body>
</html>