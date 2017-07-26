<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region', function (Blueprint $table) {
            $table->unsignedSmallInteger('id')->nullable();
			$table->primary('id');
			$table->string('name', 50)->nullable();
			$table->unsignedSmallInteger('parent_id')->default(0);
			$table->unsignedTinyInteger('city_id')->default(0);
			$table->integer('weight')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('region');
    }
}