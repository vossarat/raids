<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Reference extends Model
{
	public function createSex()
	{
		if (Schema::hasTable('sex') == false)
		{
			Schema::create('sex',
				function($table)
				{
					$table->unsignedTinyInteger('id')->nullable();
					$table->primary('id');
					$table->string('name', 10)->nullable();
				});
			$this->seedSex();
		}
		else
		{
			Schema::drop('sex');
		}
	}

	public function seedSex()
	{
		$this->seedingTable('sex', array(
				['id' =>1,'name'=>'не указано'],
				['id' =>2,'name'=>'мужской'],
				['id' =>3,'name'=>'женский'],
			));
	}
	
	public function createCity()
	{
		if (Schema::hasTable('city') == false)
		{
			Schema::create('city',
				function($table)
				{
					$table->unsignedTinyInteger('id')->nullable();
					$table->string('name', 7)->nullable();
				});
			$this->seedCity();
		}
		else
		{
			Schema::drop('city');
		}
	}

	public function seedCity()
	{
		$this->seedingTable('city', array(
				['id' =>0,'name'=>'область'],
				['id' =>1,'name'=>'город'],
			));
	}
	
	

	public function seedingTable($table, $items)
	{
		foreach ($items as $item)
		{
			DB::table($table)->insert(['id' => $item['id'], 'name' => $item['name']]);
		}
	}
}
