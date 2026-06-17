<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationalStructure extends Model
{
    use HasFactory;

    // Menegaskan nama tabel agar Laravel tidak bingung
    protected $table = 'organizational_structures';

    protected $fillable = [
        'position', // jabatan
        'name',     // nama
        'photo',    // foto
        'level'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}