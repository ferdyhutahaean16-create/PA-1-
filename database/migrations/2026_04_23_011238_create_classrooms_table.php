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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            
            // Kolom data ruang kelas dalam bahasa Inggris
            $table->string('name'); // Sebelumnya: nama_ruangan
            $table->text('description')->nullable(); // Sebelumnya: deskripsi
            $table->string('academic_days')->nullable(); // Sebelumnya: hari_akademik
            $table->string('image')->nullable(); // Sebelumnya: foto
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};