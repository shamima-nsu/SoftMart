<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDetailsTable extends Migration
{
   
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500);
            $table->string('logo')->nullable();
            $table->string('address', 500);
            $table->string('contactNo', 100);
            $table->string('country', 100);
            $table->string('websiteUrl', 500);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::drop('company_details');
    }
}
