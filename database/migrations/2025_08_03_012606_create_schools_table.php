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
            $table->enum('type', ['university', 'polytechnic', 'college', 'institute', 'school'])->default('university');
            $table->string('location');
            $table->string('city');
            $table->string('region');
            $table->string('country')->default('Cameroon');
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->json('images')->nullable();
            $table->string('accreditation')->nullable();
            $table->integer('founded_year')->nullable();
            $table->integer('student_population')->nullable();
            $table->boolean('is_public')->default(true);
            $table->boolean('is_active')->default(true);
            $table->date('application_deadline')->nullable();
            $table->decimal('tuition_range_min', 10, 2)->nullable();
            $table->decimal('tuition_range_max', 10, 2)->nullable();
            $table->string('currency')->default('XAF');
            $table->json('languages_offered')->nullable();
            $table->json('specializations')->nullable();
            $table->text('admission_requirements')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_position')->nullable();
            $table->json('social_media')->nullable();
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
