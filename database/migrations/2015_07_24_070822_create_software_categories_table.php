<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwareCategoriesTable extends Migration
{
    
    public function up()
    {
        Schema::create('software_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category', 100);
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::drop('software_categories');
    }
}
