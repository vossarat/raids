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
			
			$table->string('FIO', 50)->nullable();
			
			$table->unsignedTinyInteger('sex_id')->nullable();
			$table->foreign('sex_id')->references('id')->on('sex');
		
			$table->date('birthday')->nullable();
			
			$table->unsignedSmallInteger('region_id')->nullable();
			$table->foreign('region_id')->references('id')->on('region');
			
			$table->unsignedTinyInteger('city_id')->nullable();
			$table->foreign('city_id')->references('id')->on('city');
			
			$table->string('code', 3)->nullable();
			
			$table->unsignedSmallInteger('diagnose_id')->nullable();
			$table->foreign('diagnose_id')->references('id')->on('diagnose');
			
			$table->unsignedTinyInteger('family_id')->nullable();
			
			$table->unsignedTinyInteger('national_id')->nullable();
			
			$table->unsignedTinyInteger('social_id')->nullable();
			
			$table->unsignedTinyInteger('ifa_id')->nullable();
			
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
