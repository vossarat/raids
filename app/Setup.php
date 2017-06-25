<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use XBase\Table;
use App\Register;

class Setup extends Model
{
	public function makeTableRegister()
	{
		if ($this->isTable('register'))
		{
			$this->deleteTable('register');
		}
		else
		{
			$this->createTableRegister();
		}
	}

	public function createTableRegister()
	{
		Schema::create('register',
			function (Blueprint $table)
			{
				$table->increments('id');
				$table->unsignedMediumInteger('number')->nullable();
				$table->string('FIO', 50)->nullable();
				
				$table->unsignedTinyInteger('sex_id')->nullable();
				$table->foreign('sex_id')->references('id')->on('sex');
			
				$table->date('birthday')->nullable();
				$table->unsignedTinyInteger('region')->nullable();
				$table->unsignedTinyInteger('city')->nullable();
				$table->string('code', 3)->nullable();
				$table->unsignedSmallInteger('diagnose')->nullable();
				$table->unsignedTinyInteger('famaly')->nullable();
				$table->unsignedTinyInteger('national')->nullable();
				$table->unsignedTinyInteger('social')->nullable();
				$table->unsignedTinyInteger('ifa')->nullable();
				$table->date('grantdate')->nullable();
				$table->timestamps();
			});
	}

	public function deleteTable($table)
	{
		Schema::drop($table);
	}

	public function isTable($table)
	{
		$isTable = false;
		if (Schema::hasTable($table))
		{
			$isTable = true;
		}
		return $isTable;
	}

	public function appendData($pathToDBF)
	{
		$table = new Table($pathToDBF, null, 'CP866');

		$mybase = array();
		while ($record = $table->nextRecord())
		{
			$mybase[] = array(
				'nomer'   =>$record->nomer,
				'name'    =>$record->name,
				'sex_id'     =>$record->sex,
				'age'     =>$record->age,
				'region'  =>$record->region,
				'sity'    =>$record->sity,
				'kod'     =>$record->kod,
				'diagnoz' =>$record->diagnoz,
				'family'  =>$record->family,
				'national'=>$record->national,
				'social'  =>$record->social,
				'ifa'     =>$record->ifa,
				'date'    =>$record->date,
				'second'  =>$record->second,
			);
		}

		return $mybase;
	}

	public function seedRegister($appendData)
	{
		
		foreach ($appendData as $register)
		{
			Register::create([
					'number'=>$register['nomer'],
					'FIO'=>$register['name'],
					'sex_id'=>$register['sex_id'],
					'birthday'=>date("Y-m-d", strtotime($register['date']) - $register['age']*365*24*60*60),
					'region'=>$register['region'],
					'city'=>$register['sity'],
					'code'=>$register['kod'],
					'diagnose'=>$register['diagnoz'],
					'famaly'=>$register['family'],
					'national'=>$register['national'],
					'social'=>$register['social'],
					'ifa'=>$register['ifa'],
					'grantdate'=> date('Y.m.d',strtotime($register['date'])),

				]);
		}
	}


}
