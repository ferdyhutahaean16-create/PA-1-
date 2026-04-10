<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function peminjaman()
    {
        // 1. Menentukan tanggal otomatis
        // date('Y-m-d', strtotime('+1 day')) memastikan peminjaman minimal H-1
        $tglMinimal = date('Y-m-d', strtotime('+1 day'));

        $lab = [
            'name'      => 'Laboratorium Bioteknologi IT Del',
            'course'    => 'Praktikum Mikrobiologi & Genetika Molekuler', // Mata kuliah otomatis
            'room'      => 'Gedung Biotek Lt. 2',
            'image'     => 'https://vms.del.ac.id/images/lab-biotek.jpg',
            'min_date'  => $tglMinimal,
            'tools'     => [
                ['name' => 'Mikroskop Binokuler', 'stock' => 10, 'status' => 'Tersedia'],
                ['name' => 'Centrifuge High Speed', 'stock' => 2, 'status' => 'Tersedia'],
                ['name' => 'PCR Thermal Cycler', 'stock' => 1, 'status' => 'Tersedia'],
            ],
            'materials' => [
                ['name' => 'Alkohol 70%', 'stock' => '500ml', 'status' => 'Tersedia'],
                ['name' => 'Media Agar (Nutrient)', 'stock' => '250gr', 'status' => 'Tersedia'],
            ]
        ];

        return view('fasilitas.peminjaman', compact('lab'));
    }

    // Fungsi ini nanti dipanggil saat mahasiswa menekan tombol "Ajukan"
    public function store(Request $request)
    {
        // Di sini nanti logika untuk menyimpan ke database 
        // dan mengalihkan ke halaman cetak PDF
        return back()->with('success', 'Permintaan berhasil dikirim. Menunggu persetujuan admin.');
    }
}