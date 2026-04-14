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
    Schema::create('struktur_organisasis', function (Blueprint $table) {
        $table->id();
        $table->string('jabatan'); // Contoh: Rektor, Kaprodi, Kepala Laboratorium
        $table->string('nama')->nullable(); // Nama orangnya
        $table->string('foto')->nullable(); // Foto orangnya
        
        // Urutan/Level sangat penting agar kita tahu siapa yang di atas (Rektor) dan di bawah (Kaprodi)
        // Level 1 = Pucuk Pimpinan, Level 2 = Fakultas, Level 3 = Prodi/Lab
        $table->integer('level')->default(3); 
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('struktur_organisasis');
    }
};
