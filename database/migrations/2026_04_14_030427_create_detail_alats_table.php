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
    Schema::create('detail_alats', function (Blueprint $table) {
        $table->id();
        $table->foreignId('peminjaman_lab_id')->constrained('peminjaman_labs')->onDelete('cascade');
        $table->string('nama_alat');
        $table->integer('jumlah');
        $table->string('ukuran')->nullable();
        $table->string('ket_sebelum')->nullable();
        $table->string('ket_sesudah')->nullable();
        $table->string('penggantian')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_alats');
    }
};
