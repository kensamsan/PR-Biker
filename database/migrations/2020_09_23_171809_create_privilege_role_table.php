<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegeRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilege_role', function (Blueprint $table) {
            $table->integer('privilege_id')->unsigned()->index('privilege_role_privilege_id_foreign');
            $table->foreign('privilege_id')->references('id')->on('privileges')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('role_id')->unsigned()->index('privilege_role_role_id_foreign');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('privilege_role');
    }
}
