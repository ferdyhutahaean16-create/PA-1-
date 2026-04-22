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
    Schema::create('peminjamans', function (Blueprint $table) {
        $table->id();
        $table->string('nim_mahasiswa');
        $table->string('nama_mahasiswa');
        
        // Berelasi dengan tabel laboratorium (barang yang dipinjam)
        $table->foreignId('laboratorium_id')->constrained('laboratoria')->onDelete('cascade');
        
        $table->date('tanggal_peminjaman');
        $table->date('tanggal_kembali');
        // Status untuk fitur Approve/Reject
        $table->enum('status_peminjaman', ['Pending', 'Disetujui', 'Ditolak', 'Dikembalikan'])->default('Pending');
        $table->text('catatan_admin')->nullable(); // Alasan jika ditolak
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
