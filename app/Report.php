<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    public static function form4($startdate,$enddate,$region)
	{
		$data = DB::table('register')
				->leftJoin('code', 'register.code_id', '=', 'code.id')
				->select('code.code', 'code.name as codename',
					DB::raw('SUM(CASE WHEN (register.sex_id = 2) THEN 1 ELSE 0 END) as mens'),
					DB::raw('SUM(CASE WHEN (register.sex_id = 3) THEN 1 ELSE 0 END) as womens'),
					DB::raw('SUM(CASE WHEN (register.sex_id = 1) THEN 1 ELSE 0 END) as notspecified'),
					DB::raw('COUNT(register.sex_id) as total')
				)
				->orderBy('code.weight')
				->whereBetween('register.grantdate', [$startdate, $enddate])
				->where(function($query) use ($region)
					{
					    if ($region) {
					        $query->where('register.region_id', '=', $region);
					    }
					})				
				->groupBy('register.code_id')
				->get();
		return $data;
	}
}

