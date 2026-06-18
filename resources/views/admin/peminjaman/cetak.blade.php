<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Bon Peminjaman - {{ $peminjaman->borrower_name }}</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; color: #000; line-height: 1.5; font-size: 12px; }
        .container { width: 100%; max-width: 800px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; border-bottom: 3px solid #000; padding-bottom: 15px; margin-bottom: 20px; }
        .header h2, .header h3, .header p { margin: 0; padding: 0; }
        .header h2 { font-size: 18px; font-weight: bold; text-transform: uppercase; }
        .header h3 { font-size: 16px; font-weight: bold; margin-top: 5px; }
        .header p { font-size: 12px; margin-top: 5px; }
        .info-table { width: 100%; margin-bottom: 20px; border-collapse: collapse; }
        .info-table td { padding: 4px 8px; vertical-align: top; }
        .info-table td.label { width: 150px; font-weight: bold; }
        .info-table td.colon { width: 10px; text-align: center; }
        .item-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; text-align: center; }
        .item-table th, .item-table td { border: 1px solid #000; padding: 8px; }
        .item-table th { background-color: #f2f2f2; font-weight: bold; }
        .signature-section { width: 100%; margin-top: 50px; display: table; }
        .signature-box { display: table-cell; width: 50%; text-align: center; }
        .signature-space { height: 80px; }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        
        <div class="header">
            <h2>INSTITUT TEKNOLOGI DEL</h2>
            <h3>PROGRAM STUDI BIOTEKNOLOGI</h3>
            <p>Jl. Sisingamangaraja, Sitoluama, Laguboti, Toba Samosir, Sumatera Utara, Indonesia 22381</p>
            <p><strong>FORMULIR {{ strtoupper($peminjaman->service_type) }} LABORATORIUM</strong></p>
        </div>

        <table class="info-table">
            <tr>
                <td class="label">Nama Peminjam</td><td class="colon">:</td>
                <td>{{ $peminjaman->borrower_name }}</td>
                <td class="label">Tanggal Pinjam</td><td class="colon">:</td>
                <td>{{ \Carbon\Carbon::parse($peminjaman->planned_borrow_date)->format('d F Y') }}</td>
            </tr>
            <tr>
                <td class="label">NIM / NIK</td><td class="colon">:</td>
                <td>{{ $peminjaman->nim_nik }}</td>
                <td class="label">Rencana Kembali</td><td class="colon">:</td>
                <td>{{ \Carbon\Carbon::parse($peminjaman->planned_return_date)->format('d F Y') }}</td>
            </tr>
            <tr>
                <td class="label">Program Studi</td><td class="colon">:</td>
                <td>{{ $peminjaman->study_program }}</td>
                <td class="label">Lab Tujuan</td><td class="colon">:</td>
                <td>{{ $peminjaman->destination_lab }}</td>
            </tr>
            <tr>
                <td class="label">Judul Penelitian</td><td class="colon">:</td>
                <td colspan="4">{{ $peminjaman->research_title }}</td>
            </tr>
        </table>

        <h4>Daftar Barang yang Dipinjam:</h4>
        <table class="item-table">
            @if($peminjaman->loan_category == 'Alat' || $peminjaman->equipmentDetails->count() > 0)
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="45%">Nama Alat / Instrumen</th>
                        <th width="10%">Jumlah</th>
                        <th width="20%">Kondisi Keluar</th>
                        <th width="20%">Kondisi Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjaman->equipmentDetails as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td style="text-align: left;">{{ $item->equipment_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->condition_before ?? 'Baik' }}</td>
                            <td></td> {{-- Dikosongkan untuk diisi manual saat pengembalian --}}
                        </tr>
                    @empty
                        <tr><td colspan="5">Tidak ada data alat.</td></tr>
                    @endforelse
                </tbody>
            @else
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="55%">Nama Bahan Kimia</th>
                        <th width="15%">Jumlah Diminta</th>
                        <th width="25%">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjaman->materialDetails as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td style="text-align: left;">{{ $item->material_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>-</td>
                        </tr>
                    @empty
                        <tr><td colspan="4">Tidak ada data bahan.</td></tr>
                    @endforelse
                </tbody>
            @endif
        </table>

        <div class="signature-section">
            <div class="signature-box">
                <p>Menyetujui,<br>Admin Laboratorium</p>
                <div class="signature-space"></div>
                <p>_______________________</p>
            </div>
            <div class="signature-box">
                <p>Sitoluama, {{ \Carbon\Carbon::parse($peminjaman->created_at)->format('d F Y') }}<br>Peminjam,</p>
                <div class="signature-space"></div>
                <p><strong>{{ $peminjaman->borrower_name }}</strong><br>NIM/NIK: {{ $peminjaman->nim_nik }}</p>
            </div>
        </div>

    </div>
</body>
</html>