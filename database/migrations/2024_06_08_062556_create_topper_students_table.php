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
        Schema::create('topper_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->default(0);
            $table->unsignedBigInteger('academic_year_id')->default(0);
            $table->unsignedBigInteger('session_id')->default(0);
            $table->unsignedBigInteger('class_id')->default(0);
            $table->unsignedBigInteger('section_id')->default(0);
            $table->unsignedBigInteger('group_id')->default(0);
            $table->unsignedBigInteger('examination_id')->default(0);
            $table->string('result')->nullable();
            $table->longText('details')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topper_students');
    }
};
