<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('ruang_kelas', function (Blueprint $table) {
        $table->id();
        $table->string('nama_ruangan'); 
        $table->integer('kapasitas')->nullable(); 
        $table->string('fasilitas_pendukung')->nullable(); 
        $table->text('deskripsi')->nullable(); 
        
        // --- TAMBAHAN KOLOM BARU DARI FORM ANDA ---
        $table->string('hari_akademik')->nullable();
        $table->string('jam_akademik')->nullable();
        $table->string('jam_kolaboratif')->nullable();
        $table->string('foto')->nullable();   // Foto Utama
        $table->string('foto_2')->nullable(); // Foto Tambahan 1
        $table->string('foto_3')->nullable(); // Foto Tambahan 2
        $table->string('foto_4')->nullable(); // Foto Tambahan 3
        
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::table('ruang_kelas', function (Blueprint $table) {
            $table->dropColumn(['hari_akademik', 'jam_akademik', 'jam_kolaboratif', 'foto_2', 'foto_3', 'foto_4']);
        });
    }
};