<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'lecturers';

    protected $fillable = [
        'nidn', 
        'name',          // nama
        'education',     // lulusan
        'link_scholar', 
        'position',      // jabatan
        'email', 
        'phone_number',  // no_telpon
        'office_room',   // ruangan
        'photo',
        'courses_taught' // pengampu_matkul
    ];

    // Relasi Laboratorium (sebagai kepala lab)
    public function laboratory()
    {
        return $this->hasOne(Laboratory::class, 'head_of_lab_id');
    }

    public function teachings() {
        return $this->hasMany(Teaching::class); // Sebelumnya Pengajaran
    }
    public function publications() {
        return $this->hasMany(Publication::class); // Sebelumnya Publikasi
    }
    public function community_services() {
        return $this->hasMany(CommunityService::class); // Sebelumnya Pengabdian
    }
    public function researches()
    {
        return $this->hasMany(Research::class, 'lecturer_id')->orderBy('year', 'desc'); // Sebelumnya Penelitian
    }
    public function activities()
    {
        return $this->hasMany(Activity::class, 'lecturer_id')->orderBy('created_at', 'desc'); // Sebelumnya Kegiatan
    }
    public function achievements()
    {
        return $this->hasMany(Achievement::class, 'lecturer_id')->orderBy('date_earned', 'desc');// Sebelumnya Prestasi
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}