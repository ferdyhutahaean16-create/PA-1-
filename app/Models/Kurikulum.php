<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester',
        'kode_mk',
        'mata_kuliah',
        'sks',
        'kategori'
    ];
}