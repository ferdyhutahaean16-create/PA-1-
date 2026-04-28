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
        Schema::create('ruang_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ruangan'); // Tambahkan nama ruangan
            $table->text('deskripsi')->nullable(); 
            $table->string('hari_akademik')->nullable(); // Kolom yang tadi bikin error duplikat
            $table->string('foto')->nullable(); // Biasanya butuh foto untuk PA
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruang_kelas');
    }
};