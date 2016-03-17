<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsgDeleteHistory extends Migration
{
    
    public function up()
    {
        Schema::create('delete_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('messageId');
            $table->integer('deletedBy');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::drop('delete_history');
    }
}
