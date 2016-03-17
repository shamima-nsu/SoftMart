<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receiver');
            $table->integer('giver');
            $table->integer('value');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::drop('ratings');
    }
}
