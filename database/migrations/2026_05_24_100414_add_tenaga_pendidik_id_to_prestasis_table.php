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
        Schema::table('prestasis', function (Blueprint $table) {
            // Menambahkan foreign key untuk dosen (nullable karena prestasi bisa juga milik mahasiswa)
            $table->foreignId('tenaga_pendidik_id')->nullable()->constrained('tenaga_pendidiks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prestasis', function (Blueprint $table) {
            //
        });
    }
};
