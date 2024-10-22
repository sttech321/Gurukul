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
        Schema::create('add_student_class', function (Blueprint $table) {
            $table->id();
            $table->string('std_classes')->unique(); // Column for class
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('add_student_class');
    }
    
};
