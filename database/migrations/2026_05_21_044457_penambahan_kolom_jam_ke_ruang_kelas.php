<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ruang_kelas', function (Blueprint $table) {
            // Cek dan tambahkan kolom jam_akademik jika belum ada
            if (!Schema::hasColumn('ruang_kelas', 'jam_akademik')) {
                $table->string('jam_akademik')->nullable()->after('hari_akademik');
            }
            
            // Cek dan tambahkan kolom jam_kolaboratif jika belum ada
            if (!Schema::hasColumn('ruang_kelas', 'jam_kolaboratif')) {
                $table->string('jam_kolaboratif')->nullable()->after('jam_akademik');
            }
        });
    }

    public function down()
    {
        Schema::table('ruang_kelas', function (Blueprint $table) {
            $table->dropColumn(['jam_akademik', 'jam_kolaboratif']);
        });
    }
};