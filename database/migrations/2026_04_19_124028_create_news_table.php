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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            
            // Kolom data berita dalam standar Inggris
            $table->string('title'); // Sebelumnya: judul
            $table->longText('content'); // Sebelumnya: konten
            $table->string('image')->nullable(); // Sebelumnya: foto
            $table->date('published_date'); // Sebelumnya: tanggal
            $table->integer('views')->default(0); 
            
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
        Schema::dropIfExists('news');
    }
};