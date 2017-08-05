<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use XBase\Table;
use App\Register;
use Artisan;
use DB;

class Setup extends Model
{
	public function makeTable()
	{
		if ( DB::table('migrations')->count() )	{
			Artisan::call('migrate:rollback', array('--path' => 'database/migrations/register'));
			Artisan::call('migrate:rollback', array('--path' => 'database/migrations/references'));			
			return 'Таблицы удалены';
		} else {
			Artisan::call('migrate', array('--path' => 'database/migrations/references'));			
			Artisan::call('db:seed', array('--class' => 'ReferenceRegionSeeder'));
			Artisan::call('db:seed', array('--class' => 'ReferenceCitySeeder'));
			Artisan::call('db:seed', array('--class' => 'ReferenceSexSeeder'));
			Artisan::call('db:seed', array('--class' => 'ReferenceDiagnoseSeeder'));
			//Artisan::call('db:seed', array('--class' => 'ReferenceCodeSeeder'));
			Artisan::call('db:seed', array('--class' => 'ReferenceUsersSeeder'));
			
			Artisan::call('migrate', array('--path' => 'database/migrations/register'));
						
			return 'Таблицы созданы';
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
				'sex'     =>$record->sex,
				'age'     =>$record->age,
				'region'  =>$record->region,
				'sity'    =>$record->sity,
				'kod'     =>$record->kod,
				'diagnoz' =>$record->diagnoz,
				//'family'  =>$record->family,
				//'national'=>$record->national,
				//'social'  =>$record->social,
				//'ifa'     =>$record->ifa,
				'date'    =>$record->date,
				//'second'  =>$record->second,
			);
		}
		return $mybase;
	}

	public function seedRegister($appendData)
	{
		
		foreach ($appendData as $register) {
			if ( !$register['nomer'] 
					or !$register['diagnoz'] 
					or !$register['date'] 
					or !$register['region']
			) { continue; } // сброс итерации для пустой записи
			Register::create([
					'number'=>$register['nomer'],
					'surname'=>$register['name'],
					'sex_id'=>$register['sex'],
					'birthday'=>date("Y-m-d", strtotime($register['date']) - $register['age']*365*24*60*60),
					'region_id'=>$register['region'],
					'city_id'=>$register['sity']+1, //+1 для того чтоб в справочник city добавить код 0-не указано
					'code_id'=>$register['kod'],
					'diagnose_id'=>$register['diagnoz'],
					'grantdate'=> date('Y-m-d',strtotime($register['date'])),
				]);
		}
	}

}
