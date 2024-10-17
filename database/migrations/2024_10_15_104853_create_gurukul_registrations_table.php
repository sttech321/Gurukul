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
        Schema::create('gurukul_registrations', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('gurukul_name');
            $table->string('address');
            $table->string('pincode');
            $table->string('mobile_number');
    
            // Trust Information
            $table->string('trust_name');
            $table->date('trust_registration_date');
            $table->string('trust_president_name');
            $table->string('secretary_name');
            $table->string('treasurer_name');
            $table->string('principal_name');
    
            // Fund Resources
            $table->boolean('education_board_support')->default(false);
            $table->boolean('government_support')->default(false);
            $table->boolean('private_donations')->default(false);
            $table->boolean('donations_from_temples_and_mathas')->default(false);
    
            // Type of Setup
            $table->enum('setup_type', ['Pathshala', 'Gurukul', 'Tapovan', 'Gruh Gurukul', 'Adhunik Gurukul']);
    
            // Focus Area
            $table->string('focus_area')->nullable();  // Can be multiple values separated by commas
    
            // Facilities Available
            $table->boolean('school_building')->default(false);
            $table->boolean('classrooms')->default(false);
            $table->boolean('library')->default(false);
            $table->boolean('computer_room')->default(false);
            $table->boolean('kala_room')->default(false);
            $table->boolean('vyam_kasha')->default(false);
            $table->boolean('farms')->default(false);
            $table->boolean('kitchen')->default(false);
            $table->boolean('gaushala')->default(false);
            $table->boolean('ashwashala')->default(false);
            $table->boolean('workshop')->default(false);
            $table->boolean('yagna_shala')->default(false);
    
            // Education Board
            $table->boolean('registered_with_education_board')->default(false);
            $table->string('education_board_name')->nullable();
    
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurukul_registrations');
    }
};
