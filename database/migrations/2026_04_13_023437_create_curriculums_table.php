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
        Schema::create('curriculums', function (Blueprint $table) {
            $table->id();
            $table->integer('semester'); // Tetap 'semester' (Contoh: 1, 2, 3)
            $table->string('course_code'); // kode_mk (Contoh: TIB101)
            $table->string('course_name'); // mata_kuliah (Contoh: Basic Biology)
            $table->integer('credits'); // sks (Contoh: 3)
            
            // Wajib = Mandatory / Core, Pilihan = Elective
            $table->enum('category', ['Mandatory', 'Elective'])->default('Mandatory'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculums');
    }
};