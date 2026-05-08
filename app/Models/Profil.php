<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    // Mengizinkan kolom-kolom ini diisi data dari form
    protected $fillable = [
        'sejarah', 
        'visi', 
        'misi', 
        'tujuan', 
        'prospek_karir', 
        'struktur_organisasi'
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