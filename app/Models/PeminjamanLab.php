<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanLab extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_form', 'judul_penelitian', 'laboratorium', 
        'nama_peminjam', 'nim', 'prodi', 'status', 'catatan_admin'
    ];

    // Relasi ke tabel rincian alat
    public function detailAlat()
    {
        return $this->hasMany(DetailAlat::class);
    }

    // Relasi ke tabel rincian bahan
    public function detailBahan()
    {
        return $this->hasMany(DetailBahan::class);
    }
}