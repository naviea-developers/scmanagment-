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
        Schema::create('course', function (Blueprint $table) {
            $table->increments('id');
            $table->string('catId')->nullable();
            $table->string('subcatId')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('price')->nullable();
            $table->string('course_hour')->nullable();
            $table->string('total_days')->nullable();
            $table->string('feature')->nullable();
            $table->string('status')->nullable()->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
};
