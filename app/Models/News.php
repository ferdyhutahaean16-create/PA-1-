<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, Userstamps;

    // Kunci nama tabel secara eksplisit
    protected $table = 'news';

    protected $fillable = [
        'title',
        'content',
        'image',
        'published_date',
        'views'
    ];
}