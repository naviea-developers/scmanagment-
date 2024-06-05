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
        Schema::create('student_info_updates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('student_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('student_phone')->nullable();
            $table->string('student_email')->nullable();
            $table->string('student_nid')->nullable();
            $table->string('image')->nullable();

            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('father_nid')->nullable();

            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_phone')->nullable();

            $table->string('yearly_income')->nullable();

            $table->unsignedBigInteger('present_continent_id')->default(0);
            $table->unsignedBigInteger('present_country_id')->default(0);
            $table->unsignedBigInteger('present_state_id')->default(0);
            $table->unsignedBigInteger('present_city_id')->default(0);
            $table->string('present_address')->nullable();

            $table->unsignedBigInteger('permanent_continent_id')->default(0);
            $table->unsignedBigInteger('permanent_country_id')->default(0);
            $table->unsignedBigInteger('permanent_state_id')->default(0);
            $table->unsignedBigInteger('permanent_city_id')->default(0);
            $table->string('parmanent_address')->nullable();
            $table->longText('reason')->nullable();

            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_info_updates');
    }
};
