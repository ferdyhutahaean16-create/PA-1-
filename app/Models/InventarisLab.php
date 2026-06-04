<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarisLab extends Model
{
    use HasFactory;

    protected $fillable = [
    'kategori', 'nama_barang', 'spesifikasi', 'jumlah', 'satuan',
    // Kolom Baru
    'rumus_kimia', 'letak_lemari', 'letak_lab', 'berat_kotor', 'berat_bersih', 
    'tanggal_kadaluarsa', 'keterangan', 'tahun', 'penyimpanan', 'kd_barang', 'harga'
];
}