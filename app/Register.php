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
		'iinumber',
		'surname',
		'name',
		'middlename',
		'sex_id',
		'town_village_id',
		'birthday',
		'region_id',
		'city_id',
		'code_id',
		'diagnose_id',
		'user_id',
		'imunnoblot',
		'grantdate',
		'mainduplicate',
		'duplicate',
	];
	
	public function sex()
	{
		return $this->hasMany('App\Sex', 'id', 'sex_id');
	}
	
	public function town_village()
	{
		return $this->hasMany('App\TownVillage', 'id', 'town_village_id');
	}
	
	public function city()
	{
		return $this->hasMany('App\City', 'id', 'city_id');
	}
	
	/* public function region()
	{
		return $this->hasMany('App\Region', 'id', 'region_id');
	} */
	
	public function code()
	{
		return $this->hasMany('App\Code', 'id', 'code_id');
	}
	
	public function user()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
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
	
	public function ScopeSurname($query, $surname)
	{
		return $query->where('surname', 'like', "%$surname%" );
	}
	
	public function ScopeNumber($query, $number)
	{
		return $query->where('number', 'like', "%$number%" );
	}
	
	public function ScopeNewform4($query)
	{
		return $query;
	} 
	
}
