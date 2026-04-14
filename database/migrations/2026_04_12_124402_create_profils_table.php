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
    Schema::create('profils', function (Blueprint $table) {
        $table->id();
        $table->text('sejarah')->nullable();
        $table->text('visi')->nullable();
        $table->text('misi')->nullable();
        $table->text('tujuan')->nullable();
        $table->text('prospek_karir')->nullable();
        $table->string('struktur_organisasi')->nullable(); // Untuk menyimpan foto struktur
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
