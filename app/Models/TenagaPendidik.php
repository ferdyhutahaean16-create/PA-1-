<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaPendidik extends Model
{
    use HasFactory;

    // Trik agar kita tidak perlu membongkar database
    protected $table = 'dosens'; 

    protected $fillable = [
        'nidn', 
        'nama', 
        'lulusan', 
        'jabatan', 
        'email', 
        'no_telpon', 
        'ruangan', 
        'foto',
        'pengampu_matkul' // <--- Tambahkan ini di bagian akhir
    ];

    // Seorang dosen bisa menjadi kepala di sebuah lab
    public function laboratorium()
    {
        return $this->hasOne(Laboratorium::class, 'head_of_lab_id');
    }

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