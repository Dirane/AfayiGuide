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
        Schema::dropIfExists('school_applications');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('school_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('pending');
            $table->decimal('application_fee', 10, 2)->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->default('pending');
            $table->timestamp('payment_date')->nullable();
            $table->text('student_details')->nullable();
            $table->text('academic_records')->nullable();
            $table->text('documents_submitted')->nullable();
            $table->text('notes')->nullable();
            $table->text('student_notes')->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
        });
    }
};
