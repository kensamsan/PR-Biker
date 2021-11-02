<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('bike_name');
            $table->string('bike_unit');
            $table->decimal('price',18,2);
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('description',2000);

            $table->integer('renter_id')->unsigned()->nullable();
            $table->foreign('renter_id')->references('id')->on('users');
            $table->dateTime('dt_from')->nullable();
            $table->dateTime('dt_to')->nullable();

            $table->integer('billing_address_id')->unsigned()->nullable();
            $table->foreign('billing_address_id')->references('id')->on('billing_addresses');
            $table->enum('shipping_type',['pick-up','courier','gma','provincial']);
            $table->enum('status',['waiting-approval','posted','in-transit','waiting-ship','waiting','ship','delivered','cancelled','pick-up']);
            $table->enum('payment_status',['unpaid','paid'])->default('unpaid');
            $table->enum('payment_method',['paypal','cod','bank-transfer','wallet']);

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
        Schema::drop('rentals');
    }
}
