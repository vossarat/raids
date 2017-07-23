<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegister extends Migration
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
			
			$table->unsignedMediumInteger('number')->nullable();
			
			$table->string('IIN', 12)->nullable();
			$table->string('surname', 50)->nullable();
			$table->string('name', 50)->nullable();
			$table->string('middlename', 50)->nullable();
			
			$table->unsignedTinyInteger('sex_id')->nullable();
			$table->foreign('sex_id')->references('id')->on('sex');
		
			$table->date('birthday')->nullable();
			
			$table->unsignedSmallInteger('region_id')->nullable();
			$table->foreign('region_id')->references('id')->on('region');
			
			$table->unsignedTinyInteger('city_id')->nullable();
			$table->foreign('city_id')->references('id')->on('city');
			
			$table->unsignedTinyInteger('code_id')->nullable();
			$table->foreign('code_id')->references('id')->on('code');
			
			$table->unsignedSmallInteger('diagnose_id')->nullable();
			$table->foreign('diagnose_id')->references('id')->on('diagnose');
			
			$table->date('grantdate')->nullable();
			
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
