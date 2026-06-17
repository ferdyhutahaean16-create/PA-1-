<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanLab extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe_layanan',
        // 'inventaris_lab_id', -> Dihapus karena sudah pakai sistem relasi Detail (Keranjang)
        'kategori_peminjaman', 
        'nama_peminjam', 
        'nim', 
        'program_studi', 
        'ruang_lab', 
        'judul_penelitian',
        'rencana_pinjam',   
        'rencana_kembali', 
        'status',
        'catatan_admin' // 💡 Tambahan: Agar admin bisa menyimpan alasan penolakan/persetujuan
    ];

    // 1. Relasi ke Admin yang menyetujui
    public function penyetuju()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // 2. Relasi ke daftar alat yang dipinjam (Keranjang Alat)
    public function detailAlat()
    {
        return $this->hasMany(DetailAlat::class, 'peminjaman_lab_id');
    }

    // 3. Relasi ke daftar bahan yang dipinjam (Keranjang Bahan)
    public function detailBahan()
    {
        return $this->hasMany(DetailBahan::class, 'peminjaman_lab_id');
    }

    // 4. Relasi pembuat data (Audit Trail)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    // 5. Relasi pengubah data (Audit Trail)
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}