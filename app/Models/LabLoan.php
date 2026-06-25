<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabLoan extends Model
{
    use HasFactory, Userstamps;

    protected $guarded = []; 

    public function equipmentDetails()
    {
        return $this->hasMany(EquipmentLoanDetail::class, 'lab_loan_id');
    }

    public function materialDetails()
    {
        return $this->hasMany(MaterialLoanDetail::class, 'lab_loan_id');
    }
}