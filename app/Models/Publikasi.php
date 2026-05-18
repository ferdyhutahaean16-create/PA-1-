<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'tanggal_publikasi',
        'judul',
        'tipe_publikasi',
        'link_download',
        'link_view',
        'deskripsi',
        'penulis',
        'gambar',
        'tenaga_pendidik_id', 
    ];

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