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
        Schema::create('daily_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id')->default(0);
            $table->unsignedBigInteger('class_id')->default(0);
            $table->unsignedBigInteger('subject_id')->default(0);
            $table->unsignedBigInteger('session_id')->default(0);
            $table->unsignedBigInteger('section_id')->default(0);
            $table->unsignedBigInteger('group_id')->default(0);
            $table->string('lesson')->nullable();
            $table->string('page_number')->nullable();
            $table->integer('sub_banner')->default(1);
            $table->string('image')->nullable();
            $table->string('video_thumbnail')->nullable();
            $table->string('video_url')->nullable();

            // $table->integer('obtained_marke')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_classes');
    }
};
