<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'activities';

    protected $fillable = [
        'lecturer_id',
        'category',
        'title',
        'executor',
        'execution_time',
        'location',
        'description',
        'image'
    ];

    /**
     * Relasi balik ke model Lecturer (Dosen penanggung jawab kegiatan)
     */
    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }
}