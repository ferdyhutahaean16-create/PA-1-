<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenaga_pendidik_id',
        'kategori',
        'nama_peraih',
        'penyelenggara',
        'judul_prestasi',
        'tingkat',
        'tahun',
        'deskripsi',
        'foto'
    ];


    public function dosen()
    {
        return $this->belongsTo(TenagaPendidik::class, 'tenaga_pendidik_id');
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