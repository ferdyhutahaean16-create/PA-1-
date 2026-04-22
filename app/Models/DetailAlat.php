<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAlat extends Model
{
    use HasFactory;
    protected $fillable = ['peminjaman_lab_id', 'nama_alat', 'jumlah', 'ukuran', 'ket_sebelum', 'ket_sesudah', 'penggantian'];
}