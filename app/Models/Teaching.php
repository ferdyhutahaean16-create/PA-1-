<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teaching extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'teachings';

    protected $fillable = [
        'lecturer_id',    // tenaga_pendidik_id
        'course_name',    // mata_kuliah
        'semester',
        'academic_year'   // tahun_akademik
    ];

    /**
     * Relasi belongsTo (Setiap data pengajaran dimiliki oleh satu Dosen/Lecturer)
     */
    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }
}