<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToStudentRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_registrations', function (Blueprint $table) {
            $table->string('email')->unique()->after('mother_profession'); // Add email column
            $table->string('password')->after('email'); // Add password column
            $table->string('role')->default('student')->after('password'); // Add role column with default value
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_registrations', function (Blueprint $table) {
            $table->dropColumn(['email', 'password', 'role']); // Remove the added columns
        });
    }
}
