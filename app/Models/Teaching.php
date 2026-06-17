<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teaching extends Model
{
    use HasFactory;

    // Menegaskan nama tabel bahasa Inggris
    protected $table = 'teachings';

    // Kolom yang diizinkan untuk diisi massal
    protected $fillable = [
        'lecturer_id',    // Sebelumnya: tenaga_pendidik_id
        'course_name',    // Sebelumnya: mata_kuliah
        'semester',
        'academic_year'   // Sebelumnya: tahun_akademik
    ];

    /**
     * Relasi belongsTo (Setiap data pengajaran dimiliki oleh satu Dosen/Lecturer)
     */
    public function lecturer()
    {
        // Menyebutkan foreign_key 'lecturer_id' secara eksplisit sangat disarankan
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }
}