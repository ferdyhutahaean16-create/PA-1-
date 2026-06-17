<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('peminjaman_labs', function (Blueprint $table) {
            // Mengecek dan menambahkan kolom jika belum ada
            if (!Schema::hasColumn('peminjaman_labs', 'tipe_layanan')) {
                $table->string('tipe_layanan')->nullable()->after('id');
            }
            
            if (!Schema::hasColumn('peminjaman_labs', 'kategori_peminjaman')) {
                $table->string('kategori_peminjaman')->nullable()->after('tipe_layanan');
            }

            if (!Schema::hasColumn('peminjaman_labs', 'rencana_pinjam')) {
                $table->date('rencana_pinjam')->nullable()->after('judul_penelitian');
            }

            if (!Schema::hasColumn('peminjaman_labs', 'rencana_kembali')) {
                $table->date('rencana_kembali')->nullable()->after('rencana_pinjam');
            }

            if (!Schema::hasColumn('peminjaman_labs', 'catatan_admin')) {
                $table->text('catatan_admin')->nullable()->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('peminjaman_labs', function (Blueprint $table) {
            $table->dropColumn([
                'tipe_layanan', 
                'kategori_peminjaman', 
                'rencana_pinjam', 
                'rencana_kembali', 
                'catatan_admin'
            ]);
        });
    }
};