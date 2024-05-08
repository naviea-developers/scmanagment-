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
        if ( ! Schema::hasTable('allsubject')) {
            Schema::create('allsubject', function (Blueprint $table) {
                $table->id();
                $table->string('class_id')->nullable();
                $table->string('class_name')->nullable();
                $table->string('iamge')->nullable();
                $table->string('group')->nullable();
                $table->string('subject')->nullable();
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
