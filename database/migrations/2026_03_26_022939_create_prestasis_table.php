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
        $table->string('nama_prestasi');
        $table->string('nama_peraih')->nullable();
        
        // KODE ENUM ANDA DITAMBAHKAN DI SINI
        $table->enum('tingkat', ['Lokal', 'Regional', 'Nasional', 'Internasional'])->default('Lokal');
        
        $table->date('tanggal_perolehan');
        $table->string('bukti_sertifikat')->nullable();
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
