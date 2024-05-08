<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( ! Schema::hasTable('class_wise_teacher')) {
            Schema::create('class_wise_teacher', function (Blueprint $table) {
                $table->id();
                $table->string('class_id')->nullable();
                $table->string('subject_id')->nullable();
                $table->string('teacher_id')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
