<?php

namespace App\Reports;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Form4 extends Model{
	
	//Форма 4 по полу
	public static function getForm4ByGender($startdate, $enddate, $region, $residencesId, $townVillageId){
		
		$dataOnCode400 = DB::table('register')
		->select(DB::raw('100 as id'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 2) THEN 1 ELSE 0 END) as mens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 3) THEN 1 ELSE 0 END) as womens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 1) THEN 1 ELSE 0 END) as notspecified'),
			DB::raw('COUNT(register.sex_id) as total')
		)
		->whereBetween('register.grantdate', [$startdate, $enddate])
		->where(
			function($query) use ($region){
				if($region){
					$query->where('register.region_id', '=', $region);
				}
			})
		->where(
			function($query) use ($residencesId){
				if($residencesId){
					$query->where('register.city_id', '=', $residencesId);
				}
			})
		->where(
			function($query) use ($townVillageId){
				if($townVillageId){
					$query->where('register.town_village_id', '=', $townVillageId);
				}
			});
		
		$dataOnCode300 = DB::table('register')
		->select(DB::raw('26 as id'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 2) THEN 1 ELSE 0 END) as mens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 3) THEN 1 ELSE 0 END) as womens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 1) THEN 1 ELSE 0 END) as notspecified'),
			DB::raw('COUNT(register.sex_id) as total')
		)
		->whereBetween('register.grantdate', [$startdate, $enddate])
		->where('register.duplicate','=', 0)
		->where(
			function($query) use ($region){
				if($region){
					$query->where('register.region_id', '=', $region);
				}
			})
		->where(
			function($query) use ($residencesId){
				if($residencesId){
					$query->where('register.city_id', '=', $residencesId);
				}
			})
		->where(
			function($query) use ($townVillageId){
				if($townVillageId){
					$query->where('register.town_village_id', '=', $townVillageId);
				}
			});
		
		$parent = DB::table('code')
		->leftJoin('code as parent', 'parent.id', '=', 'code.parent_id')		
		->leftJoin('code as parent_parent', 'parent.parent_id', '=', 'parent_parent.id')
		->leftJoin('register', 'code.id', '=', 'register.code_id')
		->whereBetween('register.grantdate', [$startdate, $enddate])
		->where('register.duplicate','=', 0)
		->where(
			function($query) use ($region){
				if($region){
					$query->where('register.region_id', '=', $region);
				}
			})
		->where(
			function($query) use ($residencesId){
				if($residencesId){
					$query->where('register.city_id', '=', $residencesId);
				}
			})
		->where(
			function($query) use ($townVillageId){
				if($townVillageId){
					$query->where('register.town_village_id', '=', $townVillageId);
				}
			})
		->select('parent_parent.id',
			DB::raw('SUM(CASE WHEN (register.sex_id = 2) THEN 1 ELSE 0 END) as mens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 3) THEN 1 ELSE 0 END) as womens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 1) THEN 1 ELSE 0 END) as notspecified'),
			DB::raw('COUNT(register.sex_id) as total')
		)
		->groupBy('parent_parent.id');
		
		$code = DB::table('code')
		->leftJoin('code as parent', 'parent.id', '=', 'code.parent_id')		
		->leftJoin('code as parent_parent', 'parent.parent_id', '=', 'parent_parent.id')
		->leftJoin('register', 'code.id', '=', 'register.code_id')
		->whereBetween('register.grantdate', [$startdate, $enddate])
		->where('register.duplicate','=', 0)
		->where(
			function($query) use ($region){
				if($region){
					$query->where('register.region_id', '=', $region);
				}
			})
		->where(
			function($query) use ($residencesId){
				if($residencesId){
					$query->where('register.city_id', '=', $residencesId);
				}
			})
		->where(
			function($query) use ($townVillageId){
				if($townVillageId){
					$query->where('register.town_village_id', '=', $townVillageId);
				}
			})
		->whereColumn('parent.id', '<>', 'parent.parent_id')
		->select('parent.id',
			DB::raw('SUM(CASE WHEN (register.sex_id = 2) THEN 1 ELSE 0 END) as mens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 3) THEN 1 ELSE 0 END) as womens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 1) THEN 1 ELSE 0 END) as notspecified'),
			DB::raw('COUNT(register.sex_id) as total')
		)
		->groupBy('parent.id');
		
		$viewdata = DB::table('code')
		->leftJoin('code as parent', 'parent.id', '=', 'code.parent_id')		
		->leftJoin('code as parent_parent', 'parent.parent_id', '=', 'parent_parent.id')
		->leftJoin('register', 'code.id', '=', 'register.code_id')
		->whereBetween('register.grantdate', [$startdate, $enddate])
		->where('register.duplicate','=', 0)
		->where(
			function($query) use ($region){
				if($region){
					$query->where('register.region_id', '=', $region);
				}
			})
		->where(
			function($query) use ($residencesId){
				if($residencesId){
					$query->where('register.city_id', '=', $residencesId);
				}
			})
		->where(
			function($query) use ($townVillageId){
				if($townVillageId){
					$query->where('register.town_village_id', '=', $townVillageId);
				}
			})
		->whereNotIn('register.code_id', DB::table('code')->select('code.parent_id'))
		->select('code.id',
			DB::raw('SUM(CASE WHEN (register.sex_id = 2) THEN 1 ELSE 0 END) as mens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 3) THEN 1 ELSE 0 END) as womens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 1) THEN 1 ELSE 0 END) as notspecified'),
			DB::raw('COUNT(register.sex_id) as total')
		)
		->groupBy('code.id')
		->union($code)
		->union($parent)
		->union($dataOnCode300)
		->union($dataOnCode400)
		->get();
		
		/*$dataOnCode100 = self::search($viewdata, '1');
		if(!$dataOnCode100){
			$dataOnCode100 = (object) array(
			'id' => 1, // id для code 300
			'mens'=>0,		
			'womens'=>0,		
			'notspecified'=>0,		
			'total'=>0,	);
		}
				
		$dataOnCode200 = self::search($viewdata, '17');
		if(!$dataOnCode200){
			$dataOnCode200 = (object) array(
			'id' => 17, // id для code 300
			'mens'=>0,		
			'womens'=>0,		
			'notspecified'=>0,		
			'total'=>0,	);
		}
		
		$dataOnCode300 = array(
			'id' => 26, // id для code 300
			'mens'=>$dataOnCode100->mens + $dataOnCode200->mens,		
			'womens'=>$dataOnCode100->womens + $dataOnCode200->womens,		
			'notspecified'=>$dataOnCode100->notspecified + $dataOnCode200->notspecified,		
			'total'=>$dataOnCode100->total + $dataOnCode200->total,		
		);*/
		
		//return $viewdata->prepend( (object) $dataOnCode300); //объединяю db select с $dataOnCode300
		
	
		return $viewdata;

	}
	
	//Форма 4 в сравнении
	public static function getForm4ByComparison($startdate, $enddate, $region){ 
		$startdateMinusYear = date("Y-m-d",strtotime($startdate . " -1 year"));
		$enddateMinusYear = date("Y-m-d",strtotime($enddate . " -1 year"));
		
		
		$dataOnCode400 = DB::table('register')
		->select(DB::raw('100 as id'),
			DB::raw("SUM(CASE WHEN (register.grantdate BETWEEN '$startdateMinusYear' AND '$enddateMinusYear') THEN 1 ELSE 0 END) as lastcount"),
			DB::raw("SUM(CASE WHEN (register.grantdate BETWEEN '$startdate' AND '$enddate') THEN 1 ELSE 0 END) as currentcount")
		)
		->whereBetween('register.grantdate', [$startdateMinusYear, $enddate])
		->where(
			function($query) use ($region){
				if($region){
					$query->where('register.region_id', '=', $region);
				}
			});
			
		$dataOnCode300 = DB::table('register')
		->select(DB::raw('26 as id'),
			DB::raw("SUM(CASE WHEN (register.grantdate BETWEEN '$startdateMinusYear' AND '$enddateMinusYear') THEN 1 ELSE 0 END) as lastcount"),
			DB::raw("SUM(CASE WHEN (register.grantdate BETWEEN '$startdate' AND '$enddate') THEN 1 ELSE 0 END) as currentcount")
		)
		->whereBetween('register.grantdate', [$startdateMinusYear, $enddate])
		->where('register.duplicate','=', 0)
		->where(
			function($query) use ($region){
				if($region){
					$query->where('register.region_id', '=', $region);
				}
			});
		
		$parent = DB::table('code')
		->leftJoin('code as parent', 'parent.id', '=', 'code.parent_id')		
		->leftJoin('code as parent_parent', 'parent.parent_id', '=', 'parent_parent.id')
		->leftJoin('register', 'code.id', '=', 'register.code_id')
		->whereBetween('register.grantdate', [$startdateMinusYear, $enddate])
		->where('register.duplicate','=', 0)
		->where(
			function($query) use ($region){
				if($region){
					$query->where('register.region_id', '=', $region);
				}
			})
		->select('parent_parent.id',
			DB::raw("SUM(CASE WHEN (register.grantdate BETWEEN '$startdateMinusYear' AND '$enddateMinusYear') THEN 1 ELSE 0 END) as lastcount"),
			DB::raw("SUM(CASE WHEN (register.grantdate BETWEEN '$startdate' AND '$enddate') THEN 1 ELSE 0 END) as currentcount")
		)
		->groupBy('parent_parent.id');
		
		$code = DB::table('code')
		->leftJoin('code as parent', 'parent.id', '=', 'code.parent_id')		
		->leftJoin('code as parent_parent', 'parent.parent_id', '=', 'parent_parent.id')
		->leftJoin('register', 'code.id', '=', 'register.code_id')
		->whereBetween('register.grantdate', [$startdateMinusYear, $enddate])
		->where('register.duplicate','=', 0)
		->where(
			function($query) use ($region){
				if($region){
					$query->where('register.region_id', '=', $region);
				}
			})
		->whereColumn('parent.id', '<>', 'parent.parent_id')
		->select('parent.id',
			DB::raw("SUM(CASE WHEN (register.grantdate BETWEEN '$startdateMinusYear' AND '$enddateMinusYear') THEN 1 ELSE 0 END) as lastcount"),
			DB::raw("SUM(CASE WHEN (register.grantdate BETWEEN '$startdate' AND '$enddate') THEN 1 ELSE 0 END) as currentcount")
		)
		->groupBy('parent.id');
		
				
		$viewdata = DB::table('code')
		->leftJoin('code as parent', 'parent.id', '=', 'code.parent_id')		
		->leftJoin('code as parent_parent', 'parent.parent_id', '=', 'parent_parent.id')
		->leftJoin('register', 'code.id', '=', 'register.code_id')
		->whereBetween('register.grantdate', [$startdateMinusYear, $enddate])
		->where('register.duplicate','=', 0)
		->where(
			function($query) use ($region){
				if($region){
					$query->where('register.region_id', '=', $region);
				}
			})
		->whereNotIn('register.code_id', DB::table('code')->select('code.parent_id'))
		->select('code.id',
			DB::raw("SUM(CASE WHEN (register.grantdate BETWEEN '$startdateMinusYear' AND '$enddateMinusYear') THEN 1 ELSE 0 END) as lastcount"),
			DB::raw("SUM(CASE WHEN (register.grantdate BETWEEN '$startdate' AND '$enddate') THEN 1 ELSE 0 END) as currentcount")
		)
		->groupBy('code.id')
		->union($code)
		->union($parent)
		->union($dataOnCode300)
		->union($dataOnCode400)
		->get();
		
		/*$dataOnCode100 = self::search($viewdata, '1');
		if(!$dataOnCode100){
			$dataOnCode100 = (object) array(
			'id' => 1, // id для code 300
			'lastcount'=>0,		
			'currentcount'=>0,	);
		}
		
		$dataOnCode200 = self::search($viewdata, '17');
		if(!$dataOnCode200){
			$dataOnCode200 = (object) array(
			'id' => 17, // id для code 300
			'lastcount'=>0,		
			'currentcount'=>0,	);
		}
		
		$dataOnCode300 = array(
			'id' => 26, // id для code 300
			'lastcount'=>$dataOnCode100->lastcount + $dataOnCode200->lastcount,		
			'currentcount'=>$dataOnCode100->currentcount + $dataOnCode200->currentcount,		
		);*/
		
		//return $viewdata->prepend( (object) $dataOnCode300); //объединяю db select с $dataOnCode300
		return $viewdata;
		
	}
	
	/**
	* Поиск значений по индексу code для суммирования на 300 код
	* @param array $array 
	* @param code $value
	* 
	* @return 
	*/
	public static function search($array, $value){
		foreach($array as $data){
			if($data->id == $value){				
				return $data;
			}
		}			
		
	}
	
}

