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
        Schema::create('organizational_structures', function (Blueprint $table) {
            $table->id();
            $table->string('position'); // jabatan (Contoh: Rector, Head of Study Program, Head of Lab)
            $table->string('name')->nullable(); // nama
            $table->string('photo')->nullable(); // foto
            
            // Level 1 = Top Leadership, Level 2 = Faculty, Level 3 = Study Program/Lab
            $table->integer('level')->default(3); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizational_structures');
    }
};