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
        Schema::create('class_routine_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_routine_id')->default(0);
            $table->unsignedBigInteger('subject_id')->default(0);
            $table->unsignedBigInteger('teacher_id')->default(0);
            $table->unsignedBigInteger('room_id')->default(0);
            $table->unsignedBigInteger('bulding_id')->default(0);
            $table->unsignedBigInteger('floor_id')->default(0);
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
        Schema::dropIfExists('class_routine_items');
    }
};
