<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
   
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role', 100);
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::drop('user_roles');
    }
}
