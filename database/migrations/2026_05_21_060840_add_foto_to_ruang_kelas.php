<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ruang_kelas', function (Blueprint $table) {
            if (!Schema::hasColumn('ruang_kelas', 'foto')) {
                $table->string('foto')->nullable();
            }
            if (!Schema::hasColumn('ruang_kelas', 'foto_2')) {
                $table->string('foto_2')->nullable();
            }
            if (!Schema::hasColumn('ruang_kelas', 'foto_3')) {
                $table->string('foto_3')->nullable();
            }
            if (!Schema::hasColumn('ruang_kelas', 'foto_4')) {
                $table->string('foto_4')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('ruang_kelas', function (Blueprint $table) {
            $table->dropColumn(['foto', 'foto_2', 'foto_3', 'foto_4']);
        });
    }
};