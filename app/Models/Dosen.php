<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk mengizinkan penyimpanan data
    protected $guarded = [];
}