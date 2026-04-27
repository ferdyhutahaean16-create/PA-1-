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
        Schema::create('cooperations', function (Blueprint $table) {
            $table->id();
            $table->string('partner_name');
            // ENUM untuk tipe mitra
            $table->enum('type', ['Industri', 'Pendidikan', 'Pemerintah']);
            $table->date('start_date');
            $table->date('end_date')->nullable(); // Nullable karena mungkin ada kerja sama yang belum ditentukan tanggal akhirnya
            $table->text('description')->nullable();
            $table->string('document_file')->nullable(); // Untuk menyimpan file MoU/Dokumen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cooperations');
    }
};
