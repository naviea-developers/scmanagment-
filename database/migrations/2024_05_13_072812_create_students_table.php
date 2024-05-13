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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(0);
            $table->unsignedBigInteger('class_id')->default(0);
            $table->unsignedBigInteger('fee_id')->default(0);
            $table->unsignedBigInteger('academic_year_id')->default(0);
            $table->unsignedBigInteger('session_id')->default(0);
            $table->unsignedBigInteger('section_id')->default(0);
            $table->unsignedBigInteger('group_id')->default(0);
            $table->string('student_name')->nullable();
            $table->string('age')->nullable();
            $table->string('student_phone')->nullable();
            $table->string('student_email')->nullable();
            $table->string('student_nid')->nullable();

            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('father_nid')->nullable();

            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_phone')->nullable();

            $table->string('yearly_income')->nullable();
            $table->string('present_address')->nullable();
            $table->string('parmanent_address')->nullable();
            $table->string('image')->nullable();

            $table->unsignedBigInteger('present_continent_id')->default(0);
            $table->unsignedBigInteger('present_country_id')->default(0);
            $table->unsignedBigInteger('present_state_id')->default(0);
            $table->unsignedBigInteger('present_city_id')->default(0);
            $table->unsignedBigInteger('permanent_continent_id')->default(0);
            $table->unsignedBigInteger('permanent_country_id')->default(0);
            $table->unsignedBigInteger('permanent_state_id')->default(0);
            $table->unsignedBigInteger('permanent_city_id')->default(0);

            $table->string('pre_school')->nullable();
            $table->string('pre_school_name')->nullable();
            $table->unsignedBigInteger('pre_class_id')->default(0);
            $table->string('pre_roll_number')->nullable();
            $table->string('pre_school_address')->nullable();
            

            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
