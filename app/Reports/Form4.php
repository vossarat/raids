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
		->select('code.id', 'code.name as codename', 'parent.id as parentid', 'parent.name as parentname')
		->leftJoin('code as parent_parent', 'parent.parent_id', '=', 'parent_parent.id')
		->select('code.id','parent.id as parentid', 'parent_parent.id as parent_parent_id')	
		->get();		
		
		dd($parent);
		
		$newparent = DB::table('code')
		->leftJoin($parent, $parent, '=', 'code.parent_id')
		->get();
		dd($newparent);
		
		
		$dataGroupParent = DB::table('register')
		->leftJoin('code', 'register.code_id', '=', 'code.id')
		->leftJoin('code as parent', 'parent.id', '=', 'code.parent_id')
		->select('register.code_id as codeid',
			'code.parent_id as pid',
			'parent.parent_id as ppid',
			DB::raw('COUNT(*) as total')
		)
		->whereBetween('register.grantdate', [$startdate, $enddate])
		//->where('register.code_id', '=', 39)
		->groupBy('codeid')
		->get();
		
		dd($dataGroupParent);
		

		$viewdata = DB::table('register')
		->leftJoin('code', 'register.code_id', '=', 'code.id')
		->select('code.id as codeid',
			DB::raw('SUM(CASE WHEN (register.sex_id = 2) AND code.id IN(1, 2, 3) THEN 1 ELSE 0 END) as mens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 3) THEN 1 ELSE 0 END) as womens'),
			DB::raw('SUM(CASE WHEN (register.sex_id = 1) THEN 1 ELSE 0 END) as notspecified'),
			DB::raw('COUNT(register.sex_id) as total')
		)
		->whereColumn('code_id', '<>', 'code.parent_id')
		->whereBetween('register.grantdate', [$startdate, $enddate])
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
