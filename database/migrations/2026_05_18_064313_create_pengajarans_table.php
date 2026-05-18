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
    Schema::create('pengajarans', function (Blueprint $table) {
        $table->id();
        
        // Relasi ke tabel tenaga_pendidiks
        $table->foreignId('tenaga_pendidik_id')->constrained('tenaga_pendidiks')->onDelete('cascade');
        
        $table->string('mata_kuliah'); // Contoh: Biologi Sel, Kimia Organik
        $table->string('program_studi')->default('Bioteknologi'); // Tempat dia mengajar
        $table->string('semester'); // Contoh: Ganjil, Genap
        $table->string('tahun_akademik'); // Contoh: 2025/2026
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajarans');
    }
};
