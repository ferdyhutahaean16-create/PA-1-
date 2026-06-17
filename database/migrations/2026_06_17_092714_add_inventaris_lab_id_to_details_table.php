<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tambahkan ke tabel detail_alats
        Schema::table('detail_alats', function (Blueprint $table) {
            if (!Schema::hasColumn('detail_alats', 'inventaris_lab_id')) {
                // Menggunakan unsignedBigInteger karena ini adalah ID (Foreign Key)
                $table->unsignedBigInteger('inventaris_lab_id')->nullable()->after('peminjaman_lab_id');
            }
        });

        // 2. Tambahkan ke tabel detail_bahans
        Schema::table('detail_bahans', function (Blueprint $table) {
            if (!Schema::hasColumn('detail_bahans', 'inventaris_lab_id')) {
                $table->unsignedBigInteger('inventaris_lab_id')->nullable()->after('peminjaman_lab_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('detail_alats', function (Blueprint $table) {
            $table->dropColumn('inventaris_lab_id');
        });

        Schema::table('detail_bahans', function (Blueprint $table) {
            $table->dropColumn('inventaris_lab_id');
        });
    }
};