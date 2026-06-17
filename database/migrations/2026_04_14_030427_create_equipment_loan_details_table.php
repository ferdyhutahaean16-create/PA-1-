<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipment_loan_details', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel lab_loans
            $table->foreignId('lab_loan_id')->constrained('lab_loans')->onDelete('cascade');
            
            // Relasi ke tabel inventories (master barang)
            $table->unsignedBigInteger('inventory_id')->nullable();
            
            $table->string('equipment_name');
            $table->integer('quantity');
            $table->string('size')->nullable();
            $table->string('condition_before')->nullable();
            $table->string('condition_after')->nullable();
            $table->string('replacement')->nullable();
            $table->timestamps();
        $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
        $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipment_loan_details');
    }
};