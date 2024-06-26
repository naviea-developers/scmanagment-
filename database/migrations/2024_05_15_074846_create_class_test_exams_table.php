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
        Schema::create('class_test_exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id')->default(0);
            $table->unsignedBigInteger('class_id')->default(0);
            $table->unsignedBigInteger('subject_id')->default(0);
            $table->string('class_test_duration')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('class_test_exams');
    }
};
