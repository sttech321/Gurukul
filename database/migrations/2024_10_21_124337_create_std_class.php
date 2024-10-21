<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('add_student_classes ', function (Blueprint $table) {
            $table->id(); // Automatically creates an 'id' field
            $table->string('std_classes'); // Add the 'std_class' field
            $table->timestamps(); // Optional: includes created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_student_classes ');
    }
};
