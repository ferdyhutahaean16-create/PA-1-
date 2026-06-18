<?php

namespace App\Http\Controllers;

use App\Models\Classroom; 
use Illuminate\Http\Request;

class RuangKelasController extends Controller
{
    public function index()
    {
        // 💡 Nama variabel di bawah ini diubah menjadi $classrooms
        $classrooms = Classroom::orderBy('name', 'asc')->get();
        
        // 💡 Sekarang sudah cocok dengan tulisan 'classrooms' di dalam compact
        return view('fasilitas', compact('classrooms'));
    }
    
    // ... fungsi lainnya (create, store, dll) biarkan saja seperti aslinya ...
}