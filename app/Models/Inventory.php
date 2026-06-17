<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'item_name',
        'specification',
        'quantity',
        'unit',
        // Kolom Baru (Translated)
        'chemical_formula',
        'cupboard_location',
        'lab_location',
        'gross_weight',
        'net_weight',
        'expiry_date',
        'description',
        'year',
        'storage',
        'item_code',
        'price'
    ];
}