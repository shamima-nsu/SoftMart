<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
           // $table->string('slug', 100)->unique();
            $table->string('email')->unique();
            $table->string('password', 100);
            $table->string('confirmCode', 500);
            $table->boolean('verified')->default(0);
            $table->boolean('approved')->default(0);
            $table->date('dateOfBirth');
            $table->integer('userRoleId')->unsigned()->default(0);
            //$table->foreign('userRoleId')->references('id')->on('user_roles')->onDelete('cascade');
            $table->integer('companyId')->unsigned()->default(0);
            //$table->foreign('companyId')->references('id')->on('company_details')->onDelete('cascade');
            $table->string('prof_pic', 500)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
