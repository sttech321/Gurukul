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
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->id();
            // Student Details
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->date('date_of_birth');
            $table->string('aadhaar_card', 12);
            $table->string('home_address');
            
            // Father's Details
            $table->string('father_dob');
            $table->string('father_aadhaar_card', 12);
            $table->string('father_address');
            $table->string('father_mobile_number', 10);
            $table->string('father_profession');

            // Mother's Details
            $table->string('mother_dob');
            $table->string('mother_aadhaar_card', 12);
            $table->string('mother_address');
            $table->string('mother_mobile_number', 10);
            $table->string('mother_profession');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_registrations');
    }
};
