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
        Schema::create('mentorship_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('full_name');
            $table->string('whatsapp_number');
            $table->string('email');
            $table->enum('session_duration', ['15min', '30min', '1hour']);
            $table->decimal('amount', 10, 2);
            $table->text('session_topic')->nullable();
            $table->text('additional_notes')->nullable();
            $table->enum('status', ['pending', 'assigned', 'completed', 'cancelled'])->default('pending');
            $table->foreignId('assigned_mentor_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentorship_bookings');
    }
};
