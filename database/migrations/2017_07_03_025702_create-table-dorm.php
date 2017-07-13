<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDorm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dorms', function (Blueprint $table) { //create table
             $table->increments('id');
             $table->string('dorm_name');
            $table->string('dorm_address');
            $table->integer('dorm_numberWash');
            $table->string('dorm_owner');
            $table->integer('dorm_phone');
            $table->integer('user_id');
        });

        //  Schema::table --> case it Exists -> modify database 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('dorm');
    }
}
