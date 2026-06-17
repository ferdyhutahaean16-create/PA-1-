<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('peminjaman_labs', function (Blueprint $table) {
            // Mengecek dan menghapus kolom lama 'prodi' jika masih ada
            if (Schema::hasColumn('peminjaman_labs', 'prodi')) {
                $table->dropColumn('prodi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('peminjaman_labs', function (Blueprint $table) {
            // Rollback jika diperlukan
            $table->string('prodi')->nullable();
        });
    }
};