<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('result', function (Blueprint $table) {
            $table->increments('id');
            $table->string('studentId')->nullable();
            $table->string('class')->nullable();
            $table->string('roll')->nullable();
            $table->string('examId')->nullable();
            $table->string('subjectId')->nullable();
            $table->string('totalMarks')->nullable();
            $table->string('obtainedMarks')->nullable();
            $table->string('PracticalMarks')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('result');
    }
};
