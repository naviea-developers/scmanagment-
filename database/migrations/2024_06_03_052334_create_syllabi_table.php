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
        Schema::create('syllabi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id')->default(0);
            $table->unsignedBigInteger('subject_id')->default(0);
            $table->unsignedBigInteger('lession_id')->default(0);
            $table->unsignedBigInteger('examination_id')->default(0);
            $table->longText('lession_item')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syllabi');
    }
};
