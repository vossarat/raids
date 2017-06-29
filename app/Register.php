<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
	protected $table = 'register';
	
	protected $dates = ['grantdate'];

	protected $fillable = [
		'number',
		'FIO',
		'sex_id',
		'birthday',
		'region_id',
		'city_id',
		'code',
		'diagnose',
		'family',
		'national',
		'social',
		'ifa',
		'grantdate',
	];

	public function sex()
	{
		return $this->hasMany('App\Sex', 'id', 'sex_id');
	}
	
	public function city()
	{
		return $this->hasMany('App\City', 'id', 'city_id');
	}
	
	public function region()
	{
		return $this->hasMany('App\Region', 'id', 'region_id');
	}
	
	public function ScopeSexId($query, $sex)
	{
		if (!is_null($sex))
		{
			return $query->where('sex_id', $sex);
		}

	}

	public function ScopeCityId($query, $city)
	{
		if (!is_null($city))
		{
			return $query->where('city_id', $city);
		}
	}
	
	public function ScopeRegionId($query, $region)
	{
		if (!is_null($region))
		{
			return $query->where('region_id', $region);
		}
	}	


}
