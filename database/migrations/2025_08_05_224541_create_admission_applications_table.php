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
        Schema::create('admission_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->string('program_name');
            $table->decimal('program_fee', 10, 2);
            $table->decimal('application_fee', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['pending', 'processing', 'submitted', 'accepted', 'rejected', 'cancelled'])->default('pending');
            $table->text('additional_requirements')->nullable();
            $table->text('notes')->nullable();
            $table->date('deadline')->nullable();
            $table->date('submitted_at')->nullable();
            $table->date('response_date')->nullable();
            $table->text('response_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_applications');
    }
};
