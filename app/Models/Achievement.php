<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'achievements';

    protected $fillable = [
        'lecturer_id',
        'category',
        'achievement_name',
        'achiever_name',
        'level',
        'date_earned',
        'organizer',
        'description',
        'certificate_file',
        'created_by',
        'updated_by'
    ];

    /**
     * Relasi ke model Lecturer (Dosen peraih prestasi)
     */
    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }

    /**
     * Relasi ke Pencatat Data (User)
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}