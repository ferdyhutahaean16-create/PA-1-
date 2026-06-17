<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            
            // Atribut Dasar
            $table->enum('category', ['Equipment', 'Material', 'Instrument']);
            $table->string('item_name');
            $table->string('specification')->nullable();
            $table->integer('quantity')->default(0);
            $table->string('unit')->nullable();

            // Atribut Khusus Bahan (Chemicals/Materials)
            $table->string('chemical_formula')->nullable();
            $table->string('cupboard_location')->nullable();
            $table->string('lab_location')->nullable();
            $table->string('gross_weight')->nullable();
            $table->string('net_weight')->nullable();
            $table->date('expiry_date')->nullable();
            $table->text('description')->nullable(); // Keterangan

            // Atribut Khusus Alat (Equipment)
            $table->string('year')->nullable();
            $table->string('storage')->nullable();

            // Atribut Khusus Instrumen Aset Lab (Instruments)
            $table->string('item_code')->nullable(); // kd_barang
            $table->decimal('price', 15, 2)->nullable(); // Harga (gunakan decimal agar presisi)

            $table->timestamps();
        $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
        $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};