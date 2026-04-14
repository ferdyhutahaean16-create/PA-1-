<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'judul',
        'pelaksana',
        'waktu_pelaksanaan',
        'tempat',
        'deskripsi',
        'foto'
    ];
}