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
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori', ['dosen', 'mahasiswa']);
            $table->string('tipe'); // Workshop, Publikasi, Lomba, Tugas Akhir
            $table->string('judul');
            $table->string('nama_pelaku'); // Nama dosen atau mahasiswa
            $table->string('tahun');
            $table->text('keterangan')->nullable(); // Penyelenggara / Abstrak TA
            $table->string('link_jurnal_atau_pdf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};
