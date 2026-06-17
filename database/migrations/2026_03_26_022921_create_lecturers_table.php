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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nama
            $table->string('nidn')->nullable(); // Tetap 'nidn' (singkatan resmi)
            $table->string('education'); // lulusan (pendidikan terakhir)
            $table->string('position'); // jabatan
            $table->text('courses_taught'); // pengampu_matkul
            $table->string('email');
            $table->string('link_scholar')->nullable();
            $table->string('office_room'); // ruangan
            $table->string('phone_number')->nullable(); // no_telpon
            $table->string('photo')->nullable(); // foto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturers');
    }
};