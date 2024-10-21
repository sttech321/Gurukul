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
        Schema::table('add_student_classes ', function (Blueprint $table) {
            $table->string('std_classes')->unique()->change(); // Make the std_classes field unique
        });
    }

    public function down()
    {
        Schema::table('add_student_classes ', function (Blueprint $table) {
            $table->dropUnique(['std_classes']); // Remove the unique constraint
        });
    }
};
