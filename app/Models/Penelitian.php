<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    use HasFactory;

    // Daftarkan semua kolom yang boleh diisi
    protected $fillable = [
        'tenaga_pendidik_id', 
        'judul', 
        'kategori', 
        'tahun', 
        'penulis', 
        'deskripsi', 
        'file_pdf', 
        'link_jurnal'
    ];

    // Relasi balik ke Dosen (Tenaga Pendidik)
    public function dosen()
    {
        return $this->belongsTo(TenagaPendidik::class, 'tenaga_pendidik_id');
    }
}


