<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('billing_address_id')->unsigned();
            $table->foreign('billing_address_id')->references('id')->on('billing_addresses');
            $table->enum('shipping_type',['pick-up','courier','gma','provincial']);
            $table->enum('status',['processing','waiting-approval','waiting','ship','delivered','cancelled','pick-up']);
            $table->enum('payment_status',['unpaid','paid'])->default('unpaid');
            $table->enum('payment_method',['paypal','cod','bank-transfer','wallet']);
            $table->string('transaction_code');
            $table->decimal('total',18,2);
            $table->tinyInteger('is_rental')->default(0);
            $table->mediumText('notes');
            $table->timestamps();
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->integer('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
        });
          
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function(Blueprint $table) {
              $table->dropForeign(['order_id']);
             $table->dropColumn('order_id');
        });
        Schema::drop('orders');
    }
}
