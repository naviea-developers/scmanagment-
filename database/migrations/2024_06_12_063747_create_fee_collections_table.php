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
        Schema::create('fee_collections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->default(0);
            $table->unsignedBigInteger('academic_year_id')->default(0);
            $table->unsignedBigInteger('session_id')->default(0);
            $table->unsignedBigInteger('class_id')->default(0);
            $table->unsignedBigInteger('section_id')->default(0);
            $table->unsignedBigInteger('group_id')->default(0);
            $table->string('fee_unique')->nullable();
            $table->string('slip_no')->nullable();
            $table->float('receive_amount')->default(0);
            $table->float('total_amount')->default(0);
            $table->float('due_amount')->default(0);
            $table->float('fee_amount')->default(0);
            $table->float('discount_amount')->default(0);
            $table->float('fine_amount')->default(0);
            $table->dateTime('pay_date')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_collections');
    }
};