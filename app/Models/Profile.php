<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'profiles';

    protected $fillable = [
        'history',
        'vision',
        'mission',
        'goals',
        'career_prospects',
        'organizational_structure'
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