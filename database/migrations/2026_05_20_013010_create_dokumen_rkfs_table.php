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
    Schema::create('dokumen_rkfs', function (Blueprint $table) {
        $table->id();
        $table->string('judul'); // Contoh: "RKF Laboratorium Mikrobiologi 2026"
        $table->text('deskripsi')->nullable();
        $table->string('file_dokumen'); // Tempat menyimpan path file PDF/Word
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_rkfs');
    }
};
