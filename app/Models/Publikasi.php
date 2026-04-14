<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'judul',
        'penulis',
        'tanggal_publikasi',
        'tipe_publikasi',
        'link_download',
        'link_view',
        'deskripsi',
        'gambar'
    ];
}