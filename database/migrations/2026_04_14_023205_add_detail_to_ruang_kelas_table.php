<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ruang_kelas', function (Blueprint $table) {
            $table->string('hari_akademik')->nullable()->after('deskripsi');
            $table->string('jam_akademik')->nullable()->after('hari_akademik');
            $table->string('jam_kolaboratif')->nullable()->after('jam_akademik');
            $table->string('foto_2')->nullable()->after('foto');
            $table->string('foto_3')->nullable()->after('foto_2');
            $table->string('foto_4')->nullable()->after('foto_3');
        });
    }

    public function down(): void
    {
        Schema::table('ruang_kelas', function (Blueprint $table) {
            $table->dropColumn(['hari_akademik', 'jam_akademik', 'jam_kolaboratif', 'foto_2', 'foto_3', 'foto_4']);
        });
    }
};