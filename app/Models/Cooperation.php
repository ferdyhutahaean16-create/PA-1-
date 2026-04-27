<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperation extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_name', 
        'logo', // TAMBAHKAN BARIS INI
        'type', 
        'start_date', 
        'end_date', 
        'description', 
        'document_file'
    ];
}