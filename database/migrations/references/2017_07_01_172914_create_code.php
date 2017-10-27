<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('code', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->nullable();
            $table->primary('id');
            $table->string('code', 6)->nullable();			
			$table->string('name', 255)->nullable();
			$table->unsignedTinyInteger('parent_id')->default(1);
			$table->integer('weight')->default(1);
        });*/
        DB::unprepared( file_get_contents( asset('dump/code.sql') ) );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('code');
    }
}
