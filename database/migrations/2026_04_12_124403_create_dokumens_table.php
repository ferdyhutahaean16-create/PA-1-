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
    Schema::create('dokumens', function (Blueprint $table) {
        $table->id();
        $table->string('nama_dokumen');
        $table->string('kategori'); // Misal: 'Akademik', 'SOP', 'Formulir'
        $table->text('keterangan')->nullable();
        $table->string('file_path'); // Tempat menyimpan file PDF/Word
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
