<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'region';
    
    public $timestamps = false;
    
    protected $fillable = [
		'id',
		'name',
		//'is_parent',
		'parent_id',
		'city_id',
		'weight',
	];
	
	public function ScopeMaxId($query)
	{
		return $query->max('id');
	}
	
	public function parent()
	{
		return $this->hasOne('App\Region', 'id', 'parent_id');
	}
	
	public function city()
	{
		return $this->hasOne('App\City', 'id', 'city_id');
	}
}
