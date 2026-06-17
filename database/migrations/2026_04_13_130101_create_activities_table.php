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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel lecturers dengan penamaan baku (lecturer_id)
            $table->foreignId('lecturer_id')->constrained('lecturers')->onDelete('cascade');
            
            // Kolom data kegiatan dalam bahasa Inggris
            $table->string('category'); // Sebelumnya: kategori
            $table->string('title'); // Sebelumnya: judul
            $table->string('executor'); // Sebelumnya: pelaksana
            $table->string('execution_time'); // Sebelumnya: waktu_pelaksanaan (Wajib ada)
            $table->string('location')->nullable(); // Sebelumnya: tempat
            $table->text('description')->nullable(); // Sebelumnya: deskripsi
            $table->string('image')->nullable(); // Sebelumnya: foto
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};