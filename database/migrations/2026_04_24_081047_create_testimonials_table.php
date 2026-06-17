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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('graduation_year'); // Tahun lulus (misal: 2021)
            $table->string('workplace')->nullable(); // Tempat kerja saat ini (opsional)
            $table->string('position')->nullable(); // Jabatan/Posisi saat ini (opsional)
            $table->text('testimony'); // Isi testimoni
            $table->string('photo')->nullable(); // Foto profil alumni
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
        Schema::dropIfExists('testimonials');
    }
};
