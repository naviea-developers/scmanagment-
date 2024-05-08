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
        Schema::create('shopping', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('img');
            $table->text('imgGallery');
            $table->text('price');
            $table->text('brand');
            $table->text('rating')->nullable();
            $table->text('shortdesc');
            $table->text('tag')->nullable();
            $table->text('category')->nullable();
            $table->longtext('longdesc');
            $table->text('qnt');
            $table->text('delevery_crg');
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
