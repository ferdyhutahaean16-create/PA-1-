<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ruang_kelas', function (Blueprint $table) {
            // Menambahkan kolom fasilitas_pendukung setelah kapasitas
            $table->text('fasilitas_pendukung')->nullable()->after('kapasitas');
        });
    }

    public function down()
    {
        Schema::table('ruang_kelas', function (Blueprint $table) {
            // Menghapus kolom jika di-rollback
            $table->dropColumn('fasilitas_pendukung');
        });
    }
};
