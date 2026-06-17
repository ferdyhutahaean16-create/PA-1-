<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Nama tabel diubah menjadi 'documents' yang lebih universal
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Menggantikan 'judul'
            $table->text('description')->nullable(); // Menggantikan 'deskripsi'
            $table->string('file_path'); // Menggantikan 'file_dokumen'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};