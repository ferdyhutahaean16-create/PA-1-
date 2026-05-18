<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajaran extends Model
{
    use HasFactory;

    // TAMBAHKAN BARIS INI
    protected $fillable = [
        'tenaga_pendidik_id',
        'mata_kuliah',
        'semester',
        'tahun_akademik'
    ];

    // (Opsional) Jika Anda sudah menuliskan relasi belongsTo sebelumnya, biarkan saja di bawah sini
    public function tenagaPendidik()
    {
        return $this->belongsTo(TenagaPendidik::class);
    }
}