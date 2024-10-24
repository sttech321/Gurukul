<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGurukulRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('gurukul_registrations', function (Blueprint $table) {
            // Add new columns
            $table->string('email')->unique()->after('mobile_number'); // Ensure 'mobile_number' column exists
            $table->string('password')->after('email');
            $table->string('role')->after('password');
            
            // Modify 'fund_resource' to allow the new values
            $table->enum('fund_resource', [
                'education_board_support',
                'government_support',
                'private_donations',
                'donations_from_temples_and_mathas' // Adjusted enum definition
            ])->after('role'); // Ensure correct placement
            
            // Modify 'registered_with_education_board' to ENUM('Yes', 'No')
            \DB::statement("ALTER TABLE gurukul_registrations MODIFY registered_with_education_board ENUM('Yes', 'No')");

            // Drop the old fields if they exist
            $table->dropColumn([
                'education_board_support',
                'government_support',
                'private_donations',
                'donations_from_temples_and_mathas' // This was the previous enum field
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('gurukul_registrations', function (Blueprint $table) {
            // Re-add the old fields
            $table->boolean('education_board_support')->default(false)->after('facilities');
            $table->boolean('government_support')->default(false)->after('education_board_support');
            $table->boolean('private_donations')->default(false)->after('government_support');
            $table->boolean('donations_from_temples_and_mathas')->default(false)->after('private_donations');

            // Drop the new columns
            $table->dropColumn(['email', 'password', 'role']);

            // Revert 'registered_with_education_board' back to its original state if needed
            \DB::statement("ALTER TABLE gurukul_registrations MODIFY registered_with_education_board VARCHAR(255)"); // Assuming the previous type was VARCHAR
        });
    }
}
