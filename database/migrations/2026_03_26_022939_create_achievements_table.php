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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            
            // 💡 Opsional: Jika prestasi ini spesifik milik dosen, kita butuhkan relasinya.
            // Gunakan nullable() jika prestasi ini nantinya juga bisa diisi untuk Mahasiswa.
            $table->foreignId('lecturer_id')->nullable()->constrained('lecturers')->onDelete('cascade');
            
            // Kategori (Misal: 'Dosen' atau 'Mahasiswa' seperti yang dipanggil di view publik)
            $table->string('category')->default('Dosen'); 

            $table->string('achievement_name'); // Sebelumnya: nama_prestasi
            $table->string('achiever_name')->nullable(); // Sebelumnya: nama_peraih
            
            // Enum yang diterjemahkan ke bahasa Inggris
            $table->enum('level', ['Local', 'Regional', 'National', 'International'])->default('Local'); // Sebelumnya: tingkat
            
            $table->date('date_earned'); // Sebelumnya: tanggal_perolehan
            
            $table->string('organizer')->nullable(); // Sebelumnya: penyelenggara
            $table->text('description')->nullable(); // Sebelumnya: deskripsi
            
            $table->string('certificate_file')->nullable(); // Sebelumnya: bukti_sertifikat
            $table->timestamps();

            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
        });
        // Menambahkan relasi ke tabel users
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};