<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaPendidik extends Model
{
    use HasFactory;

    // Trik agar kita tidak perlu membongkar database
    protected $table = 'dosens'; 

    protected $fillable = [
        'nidn', 
        'nama', 
        'lulusan', 
        'jabatan', 
        'email', 
        'no_telpon', 
        'ruangan', 
        'foto',
        'pengampu_matkul' // <--- Tambahkan ini di bagian akhir
    ];
}