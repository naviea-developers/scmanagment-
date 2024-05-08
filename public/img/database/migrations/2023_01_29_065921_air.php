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
        Schema::create('air', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('model');
            $table->text('img');
            $table->text('class');
            $table->text('form');
            $table->text('to');
            $table->text('date');
            $table->text('start_at');
            $table->text('end_at');
            $table->text('price');
        });
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
