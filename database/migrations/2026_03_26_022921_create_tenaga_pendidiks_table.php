<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tenaga_pendidiks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nidn')->nullable(); // ✅ FIX (ga wajib & ga unique)
            $table->string('lulusan');
            $table->string('jabatan');
            $table->text('pengampu_matkul');
            $table->string('email');
            $table->string('ruangan');
            $table->string('no_telpon')->nullable(); // ✅ biar ga error lagi
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenaga_pendidiks');
    }
};