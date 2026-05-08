<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBahan extends Model
{
    use HasFactory;
    protected $fillable = ['peminjaman_lab_id', 'nama_bahan', 'jumlah', 'harga'];

    // Relasi balik ke induk peminjaman (Kode ini sama untuk kedua file)
    public function peminjaman()
    {
        return $this->belongsTo(PeminjamanLab::class, 'peminjaman_lab_id');
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