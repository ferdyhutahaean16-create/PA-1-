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
        Schema::create('inventaris_labs', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel laboratorium
            $table->foreignId('laboratorium_id')->constrained('laboratoriums')->onDelete('cascade');
            $table->enum('tipe', ['alat', 'bahan']);
            $table->string('nama');
            $table->string('stok'); // Pakai string agar bisa nulis "500 gr" atau "15 unit"
            $table->string('status'); // Tersedia, Habis, Dipakai
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris_labs');
    }
};
