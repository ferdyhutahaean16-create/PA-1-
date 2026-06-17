<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentLoanDetail extends Model
{
    use HasFactory, Userstamps;
    
    protected $guarded = [];

    public function labLoan()
    {
        return $this->belongsTo(LabLoan::class, 'lab_loan_id');
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }
}