<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use XBase\Table;
use App\Register;
use Artisan;

class Setup extends Model
{
	public function makeTableRegister()
	{
		if ($this->isTable('register'))	{
			Artisan::call('migrate:rollback', array('--path' => 'database/migrations/register'));
			return 'Таблица для регистра удалена';
		} else {
			Artisan::call('migrate', array('--path' => 'database/migrations/register'));
			return 'Таблица для регистра создана';
		}
	}
	
	public function makeReferences()
	{
		if ($this->isTable('city'))	{
			Artisan::call('migrate:rollback', array('--path' => 'database/migrations/references'));
			return 'Справочники удалены';
		} else {
			Artisan::call('migrate', array('--path' => 'database/migrations/references'));			
			Artisan::call('db:seed', array('--class' => 'ReferenceRegionSeeder'));
			Artisan::call('db:seed', array('--class' => 'ReferenceCitySeeder'));
			Artisan::call('db:seed', array('--class' => 'ReferenceSexSeeder'));
			Artisan::call('db:seed', array('--class' => 'ReferenceYearSeeder'));
			Artisan::call('db:seed', array('--class' => 'ReferenceDiagnoseSeeder'));
			Artisan::call('db:seed', array('--class' => 'ReferenceFamilySeeder'));
			Artisan::call('db:seed', array('--class' => 'ReferenceNationalSeeder'));
			Artisan::call('db:seed', array('--class' => 'ReferenceSocialSeeder'));
			Artisan::call('db:seed', array('--class' => 'ReferenceIfaSeeder'));
			
			return 'Справочники созданы';
		}
	}

	public function isTable($table)
	{
		$isTable = false;
		if (Schema::hasTable($table)) {
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
				'sex'     =>$record->sex,
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
		
		foreach ($appendData as $register) {
			Register::create([
					'number'=>$register['nomer'],
					'FIO'=>$register['name'],
					'sex_id'=>$register['sex'],
					'birthday'=>date("Y-m-d", strtotime($register['date']) - $register['age']*365*24*60*60),
					'region_id'=>$register['region'],
					'city_id'=>$register['sity']+1, //+1 для того чтоб в справочник city добавить код 0-не указано
					'code'=>$register['kod'],
					'diagnose_id'=>$register['diagnoz'],
					'family_id'=>$register['family']-1, //-1 для того чтоб в справочник family установить код "нет данных" на 0
					'national_id'=>$register['national'],
					'social_id'=>$register['social'],
					'ifa_id'=>$register['ifa'],
					'grantdate'=> date('Y-m-d',strtotime($register['date'])),
				]);
		}
	}

}
