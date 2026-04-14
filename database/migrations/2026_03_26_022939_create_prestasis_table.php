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
    Schema::create('prestasis', function (Blueprint $table) {
        $table->id();
        // Membedakan apakah ini prestasi dosen atau mahasiswa
        $table->enum('kategori', ['Dosen', 'Mahasiswa']); 
        $table->string('nama_peraih'); // Nama dosen atau mahasiswa yang juara
        $table->string('judul_prestasi'); // Contoh: Juara 1 Lomba Karya Tulis Ilmiah
        $table->string('tingkat')->nullable(); // Contoh: Nasional, Internasional, Provinsi
        $table->integer('tahun'); // Tahun perolehan prestasi
        $table->text('deskripsi')->nullable(); // Penjelasan singkat
        $table->string('foto')->nullable(); // Foto saat menerima penghargaan/medali
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
