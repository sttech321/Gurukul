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
            $table->string('name'); // Teacher's name
            $table->string('father_name'); // Father's name
            $table->string('mother_name'); // Mother's name
            $table->string('surname'); // Surname
            $table->date('date_of_birth'); // Date of birth
            $table->string('gotra'); // Gotra
            $table->string('varna'); // Varna
            $table->string('aadhaar_card'); // Aadhaar Card Details
            $table->text('home_address'); // Home address
            $table->string('mobile_number'); // Mobile number
            $table->string('guru_name'); // Guru name
            $table->string('ved_shakha'); // Ved Shakha/Pravar
            $table->text('extra_ordinary_skills')->nullable(); // Extra Ordinary Skills
            $table->text('exceptional_abilities')->nullable(); // Exceptional Abilities/Skills
            $table->string('modern_education_qualifications'); // Modern Education Qualifications
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
