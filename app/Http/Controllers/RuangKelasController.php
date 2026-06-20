<?php

namespace App\Http\Controllers;

use App\Models\Classroom; 
use Illuminate\Http\Request;

class RuangKelasController extends Controller
{
    public function index()
    {
       $classrooms = Classroom::orderBy('name', 'asc')->get();
        
        return view('fasilitas', compact('classrooms'));
    }
    
    // ... fungsi lainnya (create, store, dll) biarkan saja seperti aslinya ...
}