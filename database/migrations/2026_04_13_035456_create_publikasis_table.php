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
    Schema::create('publikasis', function (Blueprint $table) {
        $table->id();
        $table->enum('kategori', ['Dosen', 'Mahasiswa']); // Penanda milik siapa
        $table->string('judul'); // Judul Publikasi/Jurnal
        $table->string('penulis'); // Nama Penulis
        $table->string('tanggal_publikasi'); // Contoh: "April 2024"
        $table->string('tipe_publikasi')->nullable(); // Contoh: Jurnal Nasional, Prosiding
        $table->string('link_download')->nullable(); // URL file PDF
        $table->string('link_view')->nullable(); // URL website jurnal
        $table->text('deskripsi')->nullable(); // Abstrak / Ringkasan
        $table->string('gambar')->nullable(); // Cover Jurnal
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publikasis');
    }
};
