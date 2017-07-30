<?php

namespace App\Reports;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Form4 extends Model
{
    public static function getForm4($startdate, $enddate, $region) 
    {
		$dataGroupParent = DB::table('register')
        ->leftJoin('code', 'register.code_id', '=', 'code.id')
        ->select('code.parent_id as codeid',
            DB::raw('SUM(CASE WHEN (register.sex_id = 2) THEN 1 ELSE 0 END) as mens'),
            DB::raw('SUM(CASE WHEN (register.sex_id = 3) THEN 1 ELSE 0 END) as womens'),
            DB::raw('SUM(CASE WHEN (register.sex_id = 1) THEN 1 ELSE 0 END) as notspecified'),
            DB::raw('COUNT(register.sex_id) as total')
        )
        ->whereBetween('register.grantdate', [$startdate, $enddate])
        ->where(
            function($query) use ($region)
            {
                if($region)
                {
                    $query->where('register.region_id', '=', $region);
                }
            })
        ->groupBy('code.parent_id');


        $viewdata = DB::table('register')
        ->leftJoin('code', 'register.code_id', '=', 'code.id')
        ->select('code.id as codeid',
            DB::raw('SUM(CASE WHEN (register.sex_id = 2) THEN 1 ELSE 0 END) as mens'),
            DB::raw('SUM(CASE WHEN (register.sex_id = 3) THEN 1 ELSE 0 END) as womens'),
            DB::raw('SUM(CASE WHEN (register.sex_id = 1) THEN 1 ELSE 0 END) as notspecified'),
            DB::raw('COUNT(register.sex_id) as total')
        )
        ->whereColumn('code_id', '<>', 'code.parent_id')
        ->whereBetween('register.grantdate', [$startdate, $enddate])
        ->where(
            function($query) use ($region)
            {
                if($region)
                {
                    $query->where('register.region_id', '=', $region);
                }
            })
        ->groupBy('code.id')
        ->union($dataGroupParent)
        ->get();

		return $viewdata;
	}
}
