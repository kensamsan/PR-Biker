<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rental_id')->unsigned();
            $table->foreign('rental_id')->references('id')->on('rentals');
            $table->string('file_name');
            $table->string('file_original_name');
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
        Schema::drop('rental_images');
    }
}
