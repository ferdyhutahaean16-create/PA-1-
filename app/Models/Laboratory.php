<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'laboratories';

    protected $fillable = [
        'name',
        'head_of_lab',
        'facilities',
        'description',
        'image',
        'image_2',
        'image_3',
        'image_4'
    ];
}