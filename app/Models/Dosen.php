<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk mengizinkan penyimpanan data
   protected $fillable = [
    'nidn', 
    'nama', 
    'lulusan', 
    'jabatan', 
    'email', 
    'no_telpon', // <- PASTIKAN INI ADA
    'ruangan', 
    'foto'
];
}