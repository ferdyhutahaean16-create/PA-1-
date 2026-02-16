<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tabel Dosen (Sesuai source: 7-15)
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('name');             // Nama Dosen [cite: 8]
            $table->string('nidn')->unique();   // Nomor Induk Dosen [cite: 9]
            $table->string('alumni');           // Lulusan [cite: 10]
            $table->string('position');         // Jabatan [cite: 11]
            $table->text('courses');            // Pengampu Matkul [cite: 12]
            $table->string('email');            // Email akun del [cite: 13]
            $table->string('room');             // Ruangan dosen [cite: 14]
            $table->string('photo')->nullable();// Foto dosen [cite: 15]
            $table->timestamps();
        });

        // 2. Tabel Tugas Akhir Mahasiswa (Sesuai source: 23-24)
        Schema::create('final_projects', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');     // Nama [cite: 24]
            $table->string('title');            // Judul TA
            $table->text('abstract');           // Abstrak [cite: 24]
            $table->text('description');        // Deskripsi [cite: 24]
            $table->string('email');            // Email [cite: 24]
            $table->string('file_path')->nullable(); // Dokumen PDF jika ada
            $table->timestamps();
        });

        // 3. Tabel Fasilitas (Lab & Ruangan) (Sesuai source: 36-41)
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');             // Nama Fasilitas
            $table->enum('type', ['class', 'lab', 'public']); // Ruang kelas / Lab [cite: 37, 38]
            $table->text('tools')->nullable();  // Alat [cite: 40]
            $table->text('materials')->nullable(); // Bahan [cite: 41]
            $table->string('image')->nullable();// Dokumentasi [cite: 36]
            $table->timestamps();
        });

        // 4. Tabel Prestasi & Publikasi (Gabungan source: 16-22)
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title');            // Judul Prestasi/Publikasi
            $table->enum('owner_type', ['lecturer', 'student']); // Dosen/Mahasiswa [cite: 17, 20]
            $table->enum('category', ['publication', 'competition', 'workshop']); // [cite: 18, 19, 21]
            $table->text('description')->nullable(); // Hasil/Keterangan [cite: 20]
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
        Schema::dropIfExists('facilities');
        Schema::dropIfExists('final_projects');
        Schema::dropIfExists('lecturers');
    }
};