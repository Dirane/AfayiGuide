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
            $table->enum('role', ['student', 'mentor', 'admin', 'partner'])->default('student')->after('email');
            $table->string('phone')->nullable()->after('role');
            $table->text('bio')->nullable()->after('phone');
            $table->string('profile_picture')->nullable()->after('bio');
            $table->json('preferences')->nullable()->after('profile_picture');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'phone', 'bio', 'profile_picture', 'preferences']);
        });
    }
};
