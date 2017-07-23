<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
	protected $table = 'register';
	
	protected $dates = [
        'created_at',
        'updated_at',
        'grantdate',
        'birthday',
    ];
    
	protected $fillable = [
		'number',
		'IIN',
		'surname',
		'name',
		'middlename',
		'sex_id',
		'birthday',
		'region_id',
		'city_id',
		'code_id',
		'diagnose_id',
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
	
	public function code()
	{
		return $this->hasMany('App\Code', 'id', 'code_id');
	}
	
	public function diagnose()
	{
		return $this->hasMany('App\Diagnose', 'id', 'diagnose_id');
	}
	
	public function ScopeCodeId($query, $code)
	{
		if (!is_null($code))
		{
			return $query->where('code_id', $code);
		}

	}

	public function ScopeDiagnoseId($query, $diagnose)
	{
		if (!is_null($diagnose))
		{
			return $query->where('diagnose_id', $diagnose);
		}
	}
	
	public function ScopeRegionId($query, $region)
	{
		if (!is_null($region))
		{
			return $query->where('region_id', $region);
		}
	}
	
	public function ScopeNewNumber($query)
	{
		return $query->orderBy('id','desc')->first();
	}
	
	public function ScopeNewform4($query)
	{
		return $query;
	}
	
}
