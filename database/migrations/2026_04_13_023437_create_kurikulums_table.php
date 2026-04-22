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
    Schema::create('kurikulums', function (Blueprint $table) {
        $table->id();
        $table->integer('semester'); // Contoh: 1, 2, 3, dst
        $table->string('kode_mk'); // Contoh: TIB101
        $table->string('mata_kuliah'); // Contoh: Biologi Dasar
        $table->integer('sks'); // Contoh: 3
        $table->enum('kategori', ['Wajib', 'Pilihan'])->default('Wajib'); // Wajib atau Pilihan
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurikulums');
    }
};
