<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ruang_kelas', function (Blueprint $table) {
            
            // 1. Cek fasilitas pendukung
            if (!Schema::hasColumn('ruang_kelas', 'fasilitas_pendukung')) {
                $table->text('fasilitas_pendukung')->nullable()->after('kapasitas');
            }
            
            // 2. Cek hari akademik (INI YANG TADI BENTROK)
            if (!Schema::hasColumn('ruang_kelas', 'hari_akademik')) {
                $table->string('hari_akademik')->nullable()->after('deskripsi');
            }

            // 3. Cek jam akademik
            if (!Schema::hasColumn('ruang_kelas', 'jam_akademik')) {
                $table->string('jam_akademik')->nullable()->after('hari_akademik');
            }

            // 4. Cek jam kolaboratif
            if (!Schema::hasColumn('ruang_kelas', 'jam_kolaboratif')) {
                $table->string('jam_kolaboratif')->nullable()->after('jam_akademik');
            }
        });
    }

    public function down()
    {
        Schema::table('ruang_kelas', function (Blueprint $table) {
            $table->dropColumn(['fasilitas_pendukung', 'hari_akademik', 'jam_akademik', 'jam_kolaboratif']);
        });
    }
};
