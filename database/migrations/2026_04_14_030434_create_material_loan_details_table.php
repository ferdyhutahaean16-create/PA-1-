<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('material_loan_details', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel lab_loans
            $table->foreignId('lab_loan_id')->constrained('lab_loans')->onDelete('cascade');
            
            // Relasi ke tabel inventories (master barang)
            $table->unsignedBigInteger('inventory_id')->nullable();
            
            $table->string('material_name');
            $table->integer('quantity');
            $table->string('price')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('material_loan_details');
    }
};