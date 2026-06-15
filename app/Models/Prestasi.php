<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $fillable = [
    'kategori',
    'nama_prestasi',
    'penyelenggara',
    'tingkat',
    'tanggal_perolehan',
    'bukti_sertifikat',  // 👈 Sesuai dengan database
    'tenaga_pendidik_id',
    'nama_peraih',
    'nama_mahasiswa' // Biarkan jika kolom ini masih tersisa di DB
];


    public function dosen()
    {
        return $this->belongsTo(TenagaPendidik::class, 'tenaga_pendidik_id');
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