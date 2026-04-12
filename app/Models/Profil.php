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
}