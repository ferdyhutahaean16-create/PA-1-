<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('peminjaman_labs', function (Blueprint $table) {
            // Cek apakah kolom lama masih ada, jika ada maka hapus
            if (Schema::hasColumn('peminjaman_labs', 'laboratorium')) {
                $table->dropColumn('laboratorium');
            }
        });
    }

    public function down(): void
    {
        Schema::table('peminjaman_labs', function (Blueprint $table) {
            // Rollback jika diperlukan
            $table->string('laboratorium')->nullable();
        });
    }
};