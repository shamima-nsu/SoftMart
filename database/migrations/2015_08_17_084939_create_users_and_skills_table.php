<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAndSkillsTable extends Migration
{
    
    public function up()
    {
        Schema::create('skillsAndUsers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->integer('skillId');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::drop('skillsAndUsers');
    }
}
