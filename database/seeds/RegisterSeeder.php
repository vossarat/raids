<?php

use Illuminate\Database\Seeder;
use App\Register;
use XBase\Table;

class RegisterSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run($this->appendData($pathToDBF))
	{
		foreach ($appendData as $register)
		{
			Register::create([
					'number'=>$register['nomer'],
					'FIO'=>$register['name'],
					'sex_id'=>$register['sex_id'],
					'birthday'=>date("Y-m-d", strtotime($register['date']) - $register['age'] * 365 * 24 * 60 * 60),
					'region_id'=>$register['region_id'],
					'city_id'=>$register['sity_id'],
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
				'region_id'  =>$record->region,
				'sity_id'    =>$record->sity,
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
	
	public function test() 
	{
		return 'test';
	}

}
