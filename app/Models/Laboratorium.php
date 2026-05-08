<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    use HasFactory;

    // Pastikan ada huruf 's' di akhir karena di database namanya 'laboratoriums'
    protected $table = 'laboratoriums';

    protected $fillable = [
        'nama_lab', 
        'kepala_lab', 
        'fasilitas', 
        'deskripsi', 
        'foto', 
        'foto_2', 
        'foto_3', 
        'foto_4'
    ];

    // Lab dikepalai oleh satu tenaga pendidik/dosen
    public function kepalaLab()
    {
        return $this->belongsTo(TenagaPendidik::class, 'head_of_lab_id');
    }

    // Lab memiliki banyak barang inventaris (jika nanti Anda ingin mendatanya)
    public function inventaris()
    {
        return $this->hasMany(InventarisLab::class, 'laboratory_id');
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