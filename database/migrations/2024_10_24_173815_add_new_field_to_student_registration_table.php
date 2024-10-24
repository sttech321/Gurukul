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
            $table->integer('teacherid')->nullable(); // Adding a new column
        });
    }
    
    public function down()
    {
        Schema::table('student_registrations', function (Blueprint $table) {
            $table->dropColumn('teacherid'); // Dropping the column in case of rollback
        });
    }
    
};
