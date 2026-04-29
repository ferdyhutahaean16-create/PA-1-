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
    Schema::create('laboratoriums', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lab');
        $table->string('kepala_lab')->nullable(); 
        $table->string('fasilitas')->nullable(); 
        $table->text('deskripsi')->nullable(); 
        $table->string('foto')->nullable();
        $table->string('foto_2')->nullable();
        $table->string('foto_3')->nullable();
        $table->string('foto_4')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratoriums');
    }
};
