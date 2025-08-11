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
        Schema::table('schools', function (Blueprint $table) {
            // Convert text columns to json columns
            $table->json('admission_requirements')->nullable()->change();
            $table->json('application_steps')->nullable()->change();
            $table->json('required_documents')->nullable()->change();
            $table->json('programs_offered')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schools', function (Blueprint $table) {
            // Convert json columns back to text columns
            $table->text('admission_requirements')->nullable()->change();
            $table->text('application_steps')->nullable()->change();
            $table->text('required_documents')->nullable()->change();
            $table->text('programs_offered')->nullable()->change();
        });
    }
};
