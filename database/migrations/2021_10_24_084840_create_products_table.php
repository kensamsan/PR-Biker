<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_code')->nullable()->unique();
            $table->string('product_name');
            $table->string('brgy');
            $table->string('description',1000);
            $table->longtext('details')->nullable();
            $table->decimal('price',18,4);
            $table->enum('listing',['products','rental']);
            $table->enum('visibility',['inactive','active']);
            $table->tinyInteger('tax_exempt')->default(0);
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

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
        Schema::drop('products');
    }
}
