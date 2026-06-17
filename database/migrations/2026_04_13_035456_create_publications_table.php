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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel lecturers dengan penamaan baku (lecturer_id)
            $table->foreignId('lecturer_id')->constrained('lecturers')->onDelete('cascade');
            
            // Kolom data publikasi dalam bahasa Inggris
            $table->enum('category', ['Dosen', 'Mahasiswa']); // Sebelumnya: kategori
            $table->string('title'); // Sebelumnya: judul
            $table->string('author'); // Sebelumnya: penulis
            $table->string('publication_date'); // Menjaga tipe string untuk format "April 2024"
            $table->string('publication_type')->nullable(); // Sebelumnya: tipe_publikasi
            $table->string('download_link')->nullable(); // Sebelumnya: link_download
            $table->string('view_link')->nullable(); // Sebelumnya: link_view
            $table->text('description')->nullable(); // Sebelumnya: deskripsi
            $table->string('cover_image')->nullable(); // Sebelumnya: gambar
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};