<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaboratoriumController extends Controller
{
    // Data Simulasi (Nanti bisa diganti database)
    private $labs = [
        'lab-mikrobiologi' => [
            'name' => 'Laboratorium Mikrobiologi',
            'course' => 'Mata Kuliah: Mikrobiologi Dasar & Genetika',
            'room' => 'Gedung A, Ruang 101',
            'image' => 'https://via.placeholder.com/800x400', // Ganti dengan foto asli
            'tools' => [
                ['name' => 'Mikroskop Binokuler', 'stock' => 15, 'status' => 'Tersedia'],
                ['name' => 'Autoklaf', 'stock' => 2, 'status' => 'Dipakai'],
                ['name' => 'Inkubator', 'stock' => 5, 'status' => 'Tersedia'],
            ],
            'materials' => [
                ['name' => 'Nutrient Agar (NA)', 'stock' => '500 gr', 'status' => 'Tersedia'],
                ['name' => 'Alkohol 70%', 'stock' => '10 Liter', 'status' => 'Tersedia'],
            ]
        ],
        'lab-biokimia' => [
            'name' => 'Laboratorium Biokimia',
            'course' => 'Mata Kuliah: Biokimia & Enzimologi',
            'room' => 'Gedung A, Ruang 102',
            'image' => 'https://via.placeholder.com/800x400',
            'tools' => [
                ['name' => 'Spektrofotometer', 'stock' => 3, 'status' => 'Tersedia'],
                ['name' => 'Sentrifuse', 'stock' => 4, 'status' => 'Tersedia'],
            ],
            'materials' => [
                ['name' => 'Larutan Buffer', 'stock' => '2 Liter', 'status' => 'Tersedia'],
                ['name' => 'Enzim Amilase', 'stock' => '100 ml', 'status' => 'Habis'],
            ]
        ],
    ];

    public function index()
    {
        return view('laboratorium.index', ['labs' => $this->labs]);
    }

    public function show($slug)
    {
        if (!isset($this->labs[$slug])) {
            abort(404);
        }
        return view('laboratorium.show', ['lab' => $this->labs[$slug], 'slug' => $slug]);
    }
}