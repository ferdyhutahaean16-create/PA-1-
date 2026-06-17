<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperation extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'partner_name', 
        'logo', // TAMBAHKAN BARIS INI
        'type', 
        'start_date', 
        'end_date', 
        'description', 
        'document_file'
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