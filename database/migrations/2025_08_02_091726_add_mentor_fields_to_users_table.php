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
            $table->string('expertise')->nullable();
            $table->string('location')->nullable();
            $table->integer('experience_years')->nullable();
            $table->decimal('hourly_rate', 10, 2)->nullable();
            $table->decimal('rating', 3, 1)->nullable();
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'expertise',
                'location',
                'experience_years',
                'hourly_rate',
                'rating',
                'is_active'
            ]);
        });
    }
};
