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
    Schema::create('detail_bahans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('peminjaman_lab_id')->constrained('peminjaman_labs')->onDelete('cascade');
        $table->string('nama_bahan');
        $table->integer('jumlah');
        $table->string('harga')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_bahans');
    }
};
