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
        if ( ! Schema::hasTable('teacher_info')) {
            Schema::create('teacher_info', function (Blueprint $table) {
                $table->id();
                $table->string('userid')->nullable();
                $table->string('edu_deg')->nullable();
                $table->string('edu_cirti')->nullable();
                $table->string('exp')->nullable();
                $table->string('sub')->nullable();
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
