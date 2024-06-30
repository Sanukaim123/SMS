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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file_path')->nullable();
            $table->string('course_code');
            $table->string('employee_id');
            $table->timestamps();

            $table->foreign('course_code')->references('course_code')->on('courses')->onDelete('cascade');
            $table->foreign('employee_id')->references('employee_id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
