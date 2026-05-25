<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaPendidik extends Model
{
    use HasFactory;

    // Trik agar kita tidak perlu membongkar database
    protected $table = 'tenaga_pendidiks';

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

    public function pengajarans() {
        return $this->hasMany(Pengajaran::class);
    }
    public function publikasis() {
        return $this->hasMany(Publikasi::class);
    }
    public function pengabdians() {
        return $this->hasMany(Pengabdian::class);
    }

    public function penelitians()
    {
        return $this->hasMany(Penelitian::class, 'tenaga_pendidik_id')->orderBy('tahun', 'desc');
    }

    public function kegiatans()
    {
        // Relasi: Satu dosen punya banyak kegiatan
        return $this->hasMany(Kegiatan::class, 'tenaga_pendidik_id')->orderBy('created_at', 'desc');
    }

    public function prestasis()
    {
        return $this->hasMany(Prestasi::class, 'tenaga_pendidik_id')->orderBy('tanggal_perolehan', 'desc');
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