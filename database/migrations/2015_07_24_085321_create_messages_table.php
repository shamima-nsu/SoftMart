<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
   
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mainMsgId');
            $table->integer('receiver');
            $table->integer('sender');
            $table->text('content');
            $table->string('filename')->nullable();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::drop('messages');
    }
}
