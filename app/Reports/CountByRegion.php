<?php

namespace App\Reports;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CountByRegion extends Model
{
    public static function getForm($startdate, $enddate)
    {
	
		$viewdata = DB::table('register')
        ->leftJoin('region', 'register.region_id', '=', 'region.id')
        ->select('region.id as regionid',
            DB::raw('SUM(CASE WHEN (register.sex_id = 2) THEN 1 ELSE 0 END) as mens'),
            DB::raw('SUM(CASE WHEN (register.sex_id = 3) THEN 1 ELSE 0 END) as womens'),
            DB::raw('SUM(CASE WHEN (register.sex_id = 1) THEN 1 ELSE 0 END) as notspecified'),
            DB::raw('COUNT(register.sex_id) as total')
        )
        ->whereBetween('register.grantdate', [$startdate, $enddate])
        ->groupBy('region.id')        
        ->get();		
		
		return $viewdata;
	}
}
