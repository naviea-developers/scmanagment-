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
        // Schema::create('books', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('shelf_id')->default(0);
        //     $table->unsignedBigInteger('class_id')->default(0);
        //     $table->unsignedBigInteger('group_id')->default(0);
        //     $table->string('name')->nullable();
        //     $table->integer('total_set')->nullable();
        //     $table->tinyInteger('status')->default(1);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
