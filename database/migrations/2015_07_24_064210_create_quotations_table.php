<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('postId')->unsigned()->default(0);
        //    $table->foreign('postId')->references('id')->on('posts')->onDelete('cascade');
            $table->integer('vendorId')->unsigned()->default(0);
        //    $table->foreign('vendorId')->references('id')->on('users')->onDelete('cascade');
            $table->text('content')->nullable();
            $table->string('filename', 500);
            $table->string('price', 500);
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::drop('quotations');
    }
}
