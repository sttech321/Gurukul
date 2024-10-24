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
        Schema::table('teacher_registration', function (Blueprint $table) {
            $table->integer('gurukulid')->nullable()->after('modern_education_qualifications'); // New field
        });
    }
    
    public function down()
    {
        Schema::table('teacher_registration', function (Blueprint $table) {
            $table->dropColumn('gurukulid');
        });
    }
};
