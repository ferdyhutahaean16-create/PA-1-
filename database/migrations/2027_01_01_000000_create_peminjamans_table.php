<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->string('nim_mahasiswa');
            $table->string('nama_mahasiswa');
            
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_kembali');
            
            // Status untuk fitur Approve/Reject
            $table->enum('status_peminjaman', ['Pending', 'Disetujui', 'Ditolak', 'Dikembalikan'])->default('Pending');
            $table->text('catatan_admin')->nullable(); 
            $table->timestamps();

            $table->foreignId('laboratory_id')->constrained('laboratories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};