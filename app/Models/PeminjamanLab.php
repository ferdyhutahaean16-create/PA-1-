<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanLab extends Model
{
    use HasFactory;

    protected $fillable = [
    'tipe_layanan',
    'inventaris_lab_id',
    'kategori_peminjaman', 
    'nama_peminjam', 
    'nim', 
    'program_studi', 
    'ruang_lab', 
    'judul_penelitian',
    'rencana_pinjam',   // 💡 Tambahkan ini
    'rencana_kembali', 
    'status'
];

    // 1. Relasi ke Admin yang menyetujui
    public function penyetuju()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // 2. Relasi ke daftar alat (tanpa terikat ke master inventaris)
    public function detailAlat()
    {
        return $this->hasMany(DetailAlat::class, 'peminjaman_lab_id');
    }

    // 3. Relasi ke daftar bahan (tanpa terikat ke master inventaris)
    public function detailBahan()
    {
        return $this->hasMany(DetailBahan::class, 'peminjaman_lab_id');
    }

    // Tambahkan ini di Model Profil, Kurikulum, Berita, Laboratorium, dll.
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}