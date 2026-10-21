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
        Schema::create('atc_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no')->unique()->index();
            $table->string('centre_name');
            $table->string('director_name');
            $table->string('contact_number');
            $table->string('office_number')->nullable();
            $table->string('email');
            $table->text('centre_address');
            $table->text('course_details');
            $table->text('director_address');
            $table->string('year_of_establishment', 50);
            $table->string('director_photo_path');
            $table->string('director_photo_original_name')->nullable();
            $table->boolean('declaration_accepted')->default(true);
            $table->string('status', 30)->default('pending')->index(); // pending, under_review, approved, rejected
            $table->text('admin_notes')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atc_registrations');
    }
};
