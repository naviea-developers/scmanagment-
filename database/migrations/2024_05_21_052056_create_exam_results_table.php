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
        Schema::create('exam_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('examination_id')->default(0);
            $table->unsignedBigInteger('exam_class_id')->default(0);
            $table->unsignedBigInteger('teacher_id')->default(0);
            $table->unsignedBigInteger('student_id')->default(0);
            $table->unsignedBigInteger('class_id')->default(0);
            $table->unsignedBigInteger('session_id')->default(0);
            $table->unsignedBigInteger('section_id')->default(0);
            $table->unsignedBigInteger('academic_year_id')->default(0);
            $table->integer('marke')->default(0);
            $table->integer('pass_marke')->default(0);
            $table->integer('obtained_marke')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_results');
    }
};
