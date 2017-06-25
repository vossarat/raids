<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('number');
            $table->string('FIO',50);
			$table->unsignedTinyInteger('sex');			
			$table->date('birtdate');			
			$table->unsignedTinyInteger('region');			
			$table->unsignedTinyInteger('city');			
			$table->string('code',3);			
			$table->unsignedSmallInteger('diagnose');
			$table->unsignedTinyInteger('famaly');
			$table->unsignedTinyInteger('national');
			$table->unsignedTinyInteger('social');
			$table->unsignedTinyInteger('ifa');
			$table->date('grantdate');            
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
        Schema::dropIfExists('register');
    }
}
