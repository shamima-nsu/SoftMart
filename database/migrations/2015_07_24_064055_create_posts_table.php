<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->unsigned()->default(0);
         //   $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('filename')->nullable();
            $table->date('deadline');
            $table->boolean('visible')->default(0);
            $table->boolean('status')->default(1);
            $table->integer('categoryId')->unsigned()->default(0);
       //     $table->foreign('categoryId')->references('id')->on('software_categories')->onDelete('cascade');
          //  $table->string('slug')->unique();
            $table->timestamps();
        });


    }

    
    public function down()
    {
        Schema::drop('posts');
    }
}
