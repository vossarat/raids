<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
	protected $table = 'register';

	protected $fillable = [
		'number',
		'FIO',
		'sex_id',
		'birthday',
		'region',
		'city',
		'code',
		'diagnose',
		'famaly',
		'national',
		'social',
		'ifa',
		'grantdate',
	];

	public function sex()
	{
		return $this->hasMany('App\Sex', 'id', 'sex_id');
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
			return $query->where('city', $city);
		}
	}


}
