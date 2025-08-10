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
        Schema::table('users', function (Blueprint $table) {
            // Mentor-specific fields
            $table->string('expertise')->nullable()->after('interests');
            $table->integer('experience_years')->nullable()->after('expertise');
            $table->decimal('hourly_rate', 8, 2)->nullable()->after('experience_years');
            
            // User status and avatar
            $table->boolean('is_active')->default(true)->after('hourly_rate');
            $table->string('avatar')->nullable()->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['expertise', 'experience_years', 'hourly_rate', 'is_active', 'avatar']);
        });
    }
};
