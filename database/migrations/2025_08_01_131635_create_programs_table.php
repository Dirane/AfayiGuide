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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('institution');
            $table->string('location');
            $table->string('field_of_study');
            $table->string('level'); // Bachelor, Master, PhD, etc.
            $table->integer('duration_months');
            $table->decimal('tuition_fee', 10, 2)->nullable();
            $table->string('currency', 3)->default('XAF');
            $table->json('requirements')->nullable();
            $table->json('curriculum')->nullable();
            $table->string('application_deadline')->nullable();
            $table->string('start_date')->nullable();
            $table->string('website')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->json('images')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
