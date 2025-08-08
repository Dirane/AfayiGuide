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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('type');
            $table->string('location');
            $table->string('website')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('address')->nullable();
            $table->text('admission_requirements')->nullable();
            $table->text('application_steps')->nullable();
            $table->text('required_documents')->nullable();
            $table->decimal('application_fee', 10, 2)->nullable();
            $table->string('currency')->default('XAF');
            $table->date('application_deadline')->nullable();
            $table->date('academic_year_start')->nullable();
            $table->text('programs_offered')->nullable();
            $table->text('images')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->decimal('tuition_fee_min', 10, 2)->nullable();
            $table->decimal('tuition_fee_max', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
