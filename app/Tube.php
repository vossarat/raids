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
}
