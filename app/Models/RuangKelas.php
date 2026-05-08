<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangKelas extends Model
{
    use HasFactory;

    protected $table = 'ruang_kelas';

    protected $fillable = [
        'nama_ruangan',
        'kapasitas',
        'fasilitas_pendukung',
        'deskripsi',
        'hari_akademik',     // Tambahan baru
        'jam_akademik',      // Tambahan baru
        'jam_kolaboratif',   // Tambahan baru
        'foto',
        'foto_2',            // Tambahan baru
        'foto_3',            // Tambahan baru
        'foto_4'             // Tambahan baru
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