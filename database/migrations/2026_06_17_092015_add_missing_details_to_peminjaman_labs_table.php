<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('peminjaman_labs', function (Blueprint $table) {
            // Tambahkan program_studi jika belum ada
            if (!Schema::hasColumn('peminjaman_labs', 'program_studi')) {
                $table->string('program_studi')->nullable()->after('nim');
            }
            
            // Tambahkan ruang_lab jika belum ada
            if (!Schema::hasColumn('peminjaman_labs', 'ruang_lab')) {
                $table->string('ruang_lab')->nullable()->after('program_studi');
            }

            // Tambahkan judul_penelitian jika belum ada
            if (!Schema::hasColumn('peminjaman_labs', 'judul_penelitian')) {
                $table->string('judul_penelitian')->nullable()->after('ruang_lab');
            }
        });
    }

    public function down(): void
    {
        Schema::table('peminjaman_labs', function (Blueprint $table) {
            $table->dropColumn([
                'program_studi', 
                'ruang_lab', 
                'judul_penelitian'
            ]);
        });
    }
};