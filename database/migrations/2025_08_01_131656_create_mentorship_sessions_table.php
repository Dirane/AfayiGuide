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
        Schema::create('mentorship_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('mentor_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->datetime('scheduled_at');
            $table->integer('duration_minutes')->default(60);
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->enum('session_type', ['video_call', 'voice_call', 'chat', 'in_person'])->default('video_call');
            $table->string('meeting_link')->nullable();
            $table->text('notes')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('currency', 3)->default('XAF');
            $table->string('payment_status')->default('pending');
            $table->string('payment_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentorship_sessions');
    }
};
