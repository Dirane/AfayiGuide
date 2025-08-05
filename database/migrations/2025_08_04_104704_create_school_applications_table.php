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
        Schema::create('school_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('pending'); // pending, approved, rejected, paid, completed
            $table->decimal('application_fee', 10, 2)->nullable();
            $table->string('payment_method')->nullable(); // manual, online
            $table->string('payment_status')->default('pending'); // pending, paid, failed
            $table->timestamp('payment_date')->nullable();
            $table->text('student_details')->nullable(); // JSON with student information
            $table->text('academic_records')->nullable(); // JSON with academic information
            $table->text('documents_submitted')->nullable(); // JSON with document list
            $table->text('notes')->nullable(); // Admin notes
            $table->text('student_notes')->nullable(); // Student notes
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_applications');
    }
};
