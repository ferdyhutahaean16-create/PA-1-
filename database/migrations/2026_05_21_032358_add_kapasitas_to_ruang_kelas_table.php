<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ruang_kelas', function (Blueprint $table) {
            // Menambahkan kolom kapasitas bertipe integer (angka)
            $table->integer('kapasitas')->nullable()->after('nama_ruangan');
        });
    }

    public function down()
    {
        Schema::table('ruang_kelas', function (Blueprint $table) {
            // Menghapus kolom jika di-rollback
            $table->dropColumn('kapasitas');
        });
    }
};