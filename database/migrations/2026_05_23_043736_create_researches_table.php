<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('researches', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel lecturers dengan nama kolom yang baku (lecturer_id)
            $table->foreignId('lecturer_id')->constrained('lecturers')->onDelete('cascade');
            
            // Kolom data penelitian dalam bahasa Inggris
            $table->string('title'); // Sebelumnya: judul
            $table->string('category')->default('Research'); // Sebelumnya: kategori
            $table->string('year', 4); // Sebelumnya: tahun
            $table->string('author'); // Sebelumnya: penulis
            $table->longText('description')->nullable(); // Sebelumnya: deskripsi
            $table->string('pdf_file')->nullable(); // Sebelumnya: file_pdf
            $table->string('journal_link')->nullable(); // Sebelumnya: link_jurnal
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('researches');
    }
};