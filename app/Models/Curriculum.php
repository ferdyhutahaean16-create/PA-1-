<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory, Userstamps;

    // Menegaskan nama tabel jamak bahasa Inggris
    protected $table = 'curriculums';

    protected $fillable = [
        'semester',
        'course_code', // kode_mk
        'course_name', // mata_kuliah
        'credits',     // sks
        'category'     // kategori
    ];

        // Tambahkan ini di Model Profil, Kurikulum, Berita, Laboratorium, dll.
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}