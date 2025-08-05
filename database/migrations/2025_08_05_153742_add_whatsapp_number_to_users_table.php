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
            $table->string('whatsapp_number')->nullable()->after('phone');
            $table->string('full_name')->nullable()->after('name');
            $table->enum('academic_level', ['advanced_level', 'hnd', 'degree', 'other'])->nullable()->after('whatsapp_number');
            $table->text('interests')->nullable()->after('academic_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['whatsapp_number', 'full_name', 'academic_level', 'interests']);
        });
    }
};
