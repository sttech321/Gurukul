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
        Schema::create('book_issues', function (Blueprint $table) {
            $table->id(); // Id field
            $table->foreignId('book_id')->constrained()->onDelete('cascade'); // Book reference
            $table->string('isbn'); // ISBN field
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User reference
            $table->date('issue_date'); // Issue Date field
            $table->date('expected_return'); // Expected Return Date field
            $table->date('return_date')->nullable(); // Return Date (nullable for pending returns)
            $table->enum('status', ['issued', 'returned', 'overdue']); // Status field (issued, returned, overdue)
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
        Schema::dropIfExists('book_issues');
    }
};
