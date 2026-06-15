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
            // Menambahkan kolom kategori
            $table->enum('kategori', ['Dosen', 'Mahasiswa'])->default('Mahasiswa')->after('id');
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
