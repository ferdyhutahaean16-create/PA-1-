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
        Schema::table('peminjaman_labs', function (Blueprint $table) {
            // Menambahkan kolom tanggal (bisa diletakkan setelah kolom tertentu jika mau, misal setelah 'keperluan')
            $table->date('rencana_pinjam')->nullable()->after('status');
            $table->date('rencana_kembali')->nullable()->after('rencana_pinjam');
        });
    }
    
    public function down()
    {
        Schema::table('peminjaman_labs', function (Blueprint $table) {
            $table->dropColumn(['rencana_pinjam', 'rencana_kembali']);
        });
    }
};
