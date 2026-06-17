<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lab_loans', function (Blueprint $table) {
            $table->id();
            $table->string('service_type')->default('Peminjaman Alat');
            $table->string('loan_category')->default('Alat');
            $table->string('borrower_name');
            $table->string('nim_nik')->nullable();
            $table->string('study_program');
            $table->string('destination_lab');
            $table->date('planned_borrow_date');
            $table->date('planned_return_date');
            $table->string('research_title');
            
            // Status diterjemahkan
            $table->enum('status', ['Pending', 'Approved', 'Rejected', 'Completed'])->default('Pending');
            
            $table->text('admin_notes')->nullable();
            $table->date('returned_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lab_loans');
    }
};