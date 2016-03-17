<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('postId');
            $table->integer('userId');
            $table->text('content');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::drop('comments');
    }
}
