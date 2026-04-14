<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBahan extends Model
{
    use HasFactory;
    protected $fillable = ['peminjaman_lab_id', 'nama_bahan', 'jumlah', 'harga'];
}