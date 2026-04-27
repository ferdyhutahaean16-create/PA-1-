<?php

namespace App\Http\Controllers;

use App\Models\Cooperation;
use Illuminate\Http\Request;

class CooperationController extends Controller
{
    public function index()
    {
        // Mengambil semua mitra dan mengurutkannya berdasarkan nama
        $cooperations = Cooperation::orderBy('partner_name', 'asc')->get();
        
        // Mengelompokkan mitra berdasarkan tipe untuk mempermudah navigasi di view
        $groups = $cooperations->groupBy('type');
        
        return view('mitra.index', compact('groups', 'cooperations'));
    }
}