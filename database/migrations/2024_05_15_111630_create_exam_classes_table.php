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
        Schema::create('exam_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('examination_id')->default(0);
            $table->unsignedBigInteger('class_id')->default(0);
            $table->unsignedBigInteger('group_id')->default(0);
            $table->unsignedBigInteger('subject_id')->default(0);
            $table->unsignedBigInteger('examtype_id')->default(0);
            $table->integer('marke')->default(0);
            $table->integer('pass_marke')->default(0);
            $table->string('date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_classes');
    }
};
