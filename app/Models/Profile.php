<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'profiles';

    // Mengizinkan kolom-kolom ini diisi data dari form
    protected $fillable = [
        'history',
        'vision',
        'mission',
        'goals',
        'career_prospects',
        'organizational_structure'
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