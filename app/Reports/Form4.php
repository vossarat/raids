<?php

namespace App\Reports;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Form4 extends Model{
	
	//Форма 4 по полу
	public static function getForm4ByGender($startdate, $enddate, $region)
	{
		$parent = DB::table('code')
		->leftJoin('code as parent', 'parent.id', '=', 'code.parent_id')		
		->leftJoin('code as parent_parent', 'parent.parent_id', '=', 'parent_parent.id')
		->leftJoin('register', 'code.id', '=', 'register.code_id')
		->whereBetween('register.grantdate', [$startdate, $enddate])
		->select('parent_parent.id',
			DB::raw('SUM(CASE WHEN (register.sex_id = 2) THEN 1 ELSE 0 END) as mens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 3) THEN 1 ELSE 0 END) as womens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 1) THEN 1 ELSE 0 END) as notspecified'),
			DB::raw('COUNT(register.sex_id) as total')
		)
		->groupBy('parent_parent.id');


		$code = DB::table('code')
		->leftJoin('code as parent', 'parent.id', '=', 'code.parent_id')		
		->leftJoin('register', 'code.id', '=', 'register.code_id')
		->whereBetween('register.grantdate', [$startdate, $enddate])
		//->whereColumn('parent.id', '<>', 'code.parent_id')
		->select('parent.id as parentid',
			DB::raw('SUM(CASE WHEN (register.sex_id = 2) THEN 1 ELSE 0 END) as mens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 3) THEN 1 ELSE 0 END) as womens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 1) THEN 1 ELSE 0 END) as notspecified'),
			DB::raw('COUNT(register.sex_id) as total')
		)
		->groupBy('parent.id');

		
		$viewdata = DB::table('code')
		->leftJoin('register', 'code.id', '=', 'register.code_id')
		->whereBetween('register.grantdate', [$startdate, $enddate])
		->whereColumn('register.code_id', '<>', 'code.parent_id')
		->select('code.id',
			DB::raw('SUM(CASE WHEN (register.sex_id = 2) THEN 1 ELSE 0 END) as mens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 3) THEN 1 ELSE 0 END) as womens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 1) THEN 1 ELSE 0 END) as notspecified'),
			DB::raw('COUNT(register.sex_id) as total')
		)
		->groupBy('code.id')
		->union($code)
		->union($parent)
		->get();
		
		return $viewdata;
	}
	
	//Форма 4 в сравнении
	public static function getForm4ByComparison($startdate, $enddate, $region)
	{ 
		$startdateMinusYear = date("Y-m-d",strtotime($startdate . " -1 year"));
		$enddateMinusYear = date("Y-m-d",strtotime($enddate . " -1 year"));
  	
		$dataGroupParent = DB::table('register')
		->leftJoin('code', 'register.code_id', '=', 'code.id')
		->select('code.parent_id as codeid',
			DB::raw("SUM(CASE WHEN (register.grantdate BETWEEN '$startdateMinusYear' AND '$enddateMinusYear') THEN 1 ELSE 0 END) as lastcount"),
			DB::raw("SUM(CASE WHEN (register.grantdate BETWEEN '$startdate' AND '$enddate') THEN 1 ELSE 0 END) as currentcount")
		)
		->where(
			function($query) use ($region){
				if($region){
					$query->where('register.region_id', '=', $region);
				}
			})
		->groupBy('code.parent_id');

	
		$viewdata = DB::table('register')
		->leftJoin('code', 'register.code_id', '=', 'code.id')
		->select('code.id as codeid',
			DB::raw("SUM(CASE WHEN (register.grantdate BETWEEN '$startdateMinusYear' AND '$enddateMinusYear') THEN 1 ELSE 0 END) as lastcount"),
			DB::raw("SUM(CASE WHEN (register.grantdate BETWEEN '$startdate' AND '$enddate') THEN 1 ELSE 0 END) as currentcount")
		)
		->whereColumn('code_id', '<>', 'code.parent_id')
		->where(
			function($query) use ($region){
				if($region){
					$query->where('register.region_id', '=', $region);
				}
			})
		->groupBy('code.id')
		->union($dataGroupParent)
		->get();
		
		return $viewdata;
	}
}
