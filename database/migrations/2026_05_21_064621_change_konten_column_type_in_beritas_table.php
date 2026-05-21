<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('beritas', function (Blueprint $table) {
            // Mengubah tipe data menjadi longText tanpa menghapus data lama
            $table->longText('konten')->change();
        });
    }

    public function down()
    {
        Schema::table('beritas', function (Blueprint $table) {
            // Mengembalikan ke text jika migrasi di-rollback
            $table->text('konten')->change();
        });
    }
};