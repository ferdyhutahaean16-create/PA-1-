<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('penelitians', function (Blueprint $table) {
        $table->id();
        
        // Relasi langsung ke tabel tenaga_pendidiks
        $table->foreignId('tenaga_pendidik_id')->constrained('tenaga_pendidiks')->onDelete('cascade');
        
        // Kolom data penelitian
        $table->string('judul');
        $table->string('kategori')->default('Riset'); // Misal: Riset, Jurnal Internasional, dll
        $table->string('tahun', 4);
        $table->string('penulis');
        $table->longText('deskripsi')->nullable();
        $table->string('file_pdf')->nullable();
        $table->string('link_jurnal')->nullable();
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penelitians');
    }
};
