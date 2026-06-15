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
    Schema::table('inventaris_labs', function (Blueprint $table) {
        // Atribut Khusus Bahan
        $table->string('rumus_kimia')->nullable();
        $table->string('letak_lemari')->nullable();
        $table->string('letak_lab')->nullable();
        $table->string('berat_kotor')->nullable();
        $table->string('berat_bersih')->nullable();
        $table->date('tanggal_kadaluarsa')->nullable();
        $table->text('keterangan')->nullable();

        // Atribut Khusus Alat
        $table->string('tahun')->nullable();
        $table->string('penyimpanan')->nullable();

        // Atribut Khusus Instrumen Aset Lab
        $table->string('kd_barang')->nullable();
        $table->string('harga')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventaris_labs', function (Blueprint $table) {
            //
        });
    }
};
