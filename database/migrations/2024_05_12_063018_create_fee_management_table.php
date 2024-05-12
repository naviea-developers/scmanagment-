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
        Schema::create('fee_management', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id')->default(0);
            $table->unsignedBigInteger('fee_id')->default(0);
            $table->string('fee_amount')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_management');
    }
};
