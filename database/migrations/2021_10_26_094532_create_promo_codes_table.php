<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('label')->nullable();
            $table->string('description');
            $table->enum('type',['tax','shipping','promo','sale','misc','freeshipping']);
            $table->enum('discount_type',['all','over_amount','category','product']);
            $table->integer('discount_amount')->default(0);
            $table->enum('target',['total','subtotal']);
            $table->string('value');
            $table->integer('order');
            $table->tinyInteger('banner')->default(0);
            $table->string('attributes');
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->integer('over')->nullable();
            $table->tinyInteger('active')->default(0);
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
        Schema::drop('promo_codes');
    }
}
