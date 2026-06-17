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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->text('history')->nullable();                  // sejarah
            $table->text('vision')->nullable();                   // visi
            $table->text('mission')->nullable();                  // misi
            $table->text('goals')->nullable();                    // tujuan
            $table->text('career_prospects')->nullable();         // prospek_karir
            $table->string('organizational_structure')->nullable(); // struktur_organisasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};