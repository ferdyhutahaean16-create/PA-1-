<?php

namespace App\Http\Controllers;

use App\Models\Cooperation;
use Illuminate\Http\Request;

class CooperationController extends Controller
{
    public function index()
    {
        $cooperations = Cooperation::orderBy('partner_name', 'asc')->get();
        
        $groups = $cooperations->groupBy('type');
        
        return view('mitra.index', compact('groups', 'cooperations'));
    }
}