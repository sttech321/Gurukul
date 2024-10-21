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
        Schema::table('student_registrations', function (Blueprint $table) {
            $table->integer('gurukulid')->after('mother_profession');// Example of a new field
            $table->string('std_class')->nullable(); // Example of another new field
        });
    }
    
    public function down()
    {
        Schema::table('student_registrations', function (Blueprint $table) {
            $table->dropColumn(['gurukulid', 'std_class']);
        });
    }
};
