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
    Schema::create('inventaris_labs', function (Blueprint $table) {
        $table->id();
        $table->enum('kategori', ['Alat', 'Bahan', 'Instrumen Aset Lab']);
        $table->string('nama_barang');
        $table->string('spesifikasi')->nullable(); // Opsional, misal: Merek/Ukuran/Konsentrasi
        $table->integer('jumlah')->default(0);
        $table->string('satuan')->nullable(); // Opsional, misal: Pcs, Liter, Gram
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
