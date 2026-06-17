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
    Schema::create('teachings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('lecturer_id')->constrained('lecturers')->onDelete('cascade');
        $table->string('course_name'); 
        $table->string('study_program')->default('Biotechnology'); 
        $table->string('semester'); 
        $table->string('academic_year'); 
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachings');
    }
};