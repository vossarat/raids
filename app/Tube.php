<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tube extends Model
{
	protected $table = 'tubes';
	
	public function sex()
	{
		return $this->hasMany('App\Sex', 'id', 'sex_id');
	}
	
	public function town_village()
	{
		return $this->hasMany('App\TownVillage', 'id', 'town_village_id');
	}
}
