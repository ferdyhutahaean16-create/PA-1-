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
    Schema::create('peminjaman_labs', function (Blueprint $table) {
        $table->id();
        $table->enum('jenis_form', ['Alat', 'Bahan']); // Membedakan ini form alat atau bahan
        $table->string('judul_penelitian');
        $table->string('laboratorium');
        $table->string('nama_peminjam');
        $table->string('nim')->nullable();
        $table->string('prodi');
        // Status untuk fitur Approve/Reject Admin
        $table->enum('status', ['Pending', 'Disetujui', 'Ditolak', 'Selesai'])->default('Pending');
        $table->text('catatan_admin')->nullable(); // Alasan jika ditolak
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_labs');
    }
};
