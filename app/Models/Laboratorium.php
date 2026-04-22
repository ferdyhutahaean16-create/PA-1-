<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    use HasFactory;

    protected $table = 'laboratoriums';

    protected $fillable = [
        'nama_lab', 'kepala_lab', 'fasilitas', 'deskripsi', 
        'foto', 'foto_2', 'foto_3', 'foto_4'
    ];
}