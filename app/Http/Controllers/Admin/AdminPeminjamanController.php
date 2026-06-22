<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPeminjamanController extends Controller
{
    public function validasiKembali($id_peminjaman)
{
    DB::transaction(function () use ($id_peminjaman) {
        $peminjaman = Peminjaman::with('details')->findOrFail($id_peminjaman);
        
        // Ubah Status Form
        $peminjaman->update(['status' => 'Dikembalikan']);

        // Looping untuk mengembalikan stok
        foreach ($peminjaman->details as $detail) {
            $barang = \App\Models\InventarisLab::find($detail->inventaris_lab_id);
            
            if ($barang) {
                // PENAMBAHAN STOK MATEMATIS
                preg_match('/^(\d+)\s*(.*)$/', $barang->jumlah, $matches);
                $stok_lama = isset($matches[1]) ? (int)$matches[1] : 0;
                $satuan_teks = isset($matches[2]) ? $matches[2] : '';

                // Tambahkan stok yang dikembalikan
                $stok_baru = $stok_lama + $detail->jumlah;
                $barang->jumlah = trim($stok_baru . ' ' . $satuan_teks);
                $barang->save();
            }
        }
    });

    return redirect()->back()->with('success', 'Barang berhasil dikembalikan dan stok telah pulih otomatis!');
}
}
