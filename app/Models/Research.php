<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'researches';

    protected $fillable = [
        'lecturer_id',
        'title',
        'category',
        'year',
        'author',
        'description',
        'pdf_file',
        'journal_link'
    ];

    /**
     * Relasi balik ke model Lecturer (Dosen pemilik penelitian)
     */
    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }
}