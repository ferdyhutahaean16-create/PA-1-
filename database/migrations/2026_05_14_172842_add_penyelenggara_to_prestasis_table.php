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
    Schema::table('prestasis', function (Blueprint $table) {
        // Menambahkan kolom penyelenggara tepat setelah nama mahasiswa
        $table->string('penyelenggara')->after('nama_mahasiswa');
    });
}

public function down(): void
{
    Schema::table('prestasis', function (Blueprint $table) {
        $table->dropColumn('penyelenggara');
    });
}
};
