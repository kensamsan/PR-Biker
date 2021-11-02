<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',300);
        });
         Schema::table('cities', function (Blueprint $table) {
            $table->foreign('province_id')->references('id')->on('provinces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
   
        Schema::table('cities', function(Blueprint $table) {
              $table->dropForeign(['province_id']);
             $table->dropColumn('province_id');
        });
        Schema::drop('provinces');
    }
}
