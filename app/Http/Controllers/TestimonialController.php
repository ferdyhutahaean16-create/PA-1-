<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        // Mengambil semua testimoni, diurutkan dari yang terbaru, dengan pagination (9 per halaman)
        $testimonials = Testimonial::orderBy('created_at', 'desc')->paginate(9);
        
        return view('testimoni.index', compact('testimonials'));
    }
}