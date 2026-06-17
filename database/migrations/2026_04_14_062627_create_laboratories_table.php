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
        Schema::create('laboratories', function (Blueprint $table) {
            $table->id();
            
            // Kolom data laboratorium dalam bahasa Inggris
            $table->string('name'); // Sebelumnya: nama_lab
            $table->string('head_of_lab')->nullable(); // Sebelumnya: kepala_lab
            $table->text('facilities')->nullable(); // Sebelumnya: fasilitas
            $table->text('description')->nullable(); // Sebelumnya: deskripsi
            
            // Dokumentasi foto
            $table->string('image')->nullable(); // Sebelumnya: foto
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            
            $table->timestamps();
        $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
        $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratories');
    }
};