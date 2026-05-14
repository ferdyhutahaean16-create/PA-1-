<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'nama_peraih',
        'penyelenggara',
        'judul_prestasi',
        'tingkat',
        'tahun',
        'deskripsi',
        'foto'
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