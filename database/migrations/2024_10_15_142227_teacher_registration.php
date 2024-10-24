<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('teacher_registration', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID field
            $table->string('name')->nullable(); // Teacher's name
            $table->string('father_name')->nullable(); // Father's name
            $table->string('mother_name')->nullable(); // Mother's name
            $table->string('surname')->nullable(); // Surname
            $table->date('date_of_birth')->nullable(); // Date of birth
            $table->string('gotra')->nullable(); // Gotra
            $table->string('varna')->nullable(); // Varna
            $table->string('aadhaar_card')->nullable(); // Aadhaar Card Details
            $table->text('home_address')->nullable(); // Home address
            $table->string('mobile_number')->nullable(); // Mobile number
            $table->string('guru_name')->nullable(); // Guru name
            $table->string('ved_shakha')->nullable(); // Ved Shakha/Pravar
            $table->text('extra_ordinary_skills')->nullable(); // Extra Ordinary Skills
            $table->text('exceptional_abilities')->nullable(); // Exceptional Abilities/Skills
            $table->string('modern_education_qualifications')->nullable(); // Modern Education Qualifications
            $table->string('email')->nullable()->unique(); // Email field, nullable and unique
            $table->string('password')->nullable(); // Password field, nullable
            $table->string('role')->nullable()->default('teacher'); // Role field, nullable with default value 'teacher'
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_registration');
    }
};
