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
        Schema::create('pathfinder_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('academic_background'); // GCE A-Level, HND, etc.
            $table->string('field_of_interest');
            $table->text('career_goals');
            $table->text('aspirations');
            $table->json('skills')->nullable();
            $table->json('interests')->nullable();
            $table->string('preferred_location')->nullable();
            $table->decimal('budget_range_min', 10, 2)->nullable();
            $table->decimal('budget_range_max', 10, 2)->nullable();
            $table->string('currency', 3)->default('XAF');
            $table->json('preferences')->nullable();
            $table->text('additional_notes')->nullable();
            $table->json('recommended_programs')->nullable();
            $table->json('recommended_opportunities')->nullable();
            $table->text('pathway_report')->nullable();
            $table->string('report_file_path')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pathfinder_responses');
    }
};
