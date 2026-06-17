<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $table = 'publications';

    protected $fillable = [
        'lecturer_id',
        'category',
        'title',
        'author',
        'publication_date',
        'publication_type',
        'download_link',
        'view_link',
        'description',
        'cover_image'
    ];

    /**
     * Relasi balik ke model Lecturer
     */
    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }
}