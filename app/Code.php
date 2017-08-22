<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $table = 'code';
    
    public $timestamps = false;
    
    protected $fillable = [
		'id',
		'code',
		'name',
		'parent_id',
		'weight',
	];
	
	public function parent()
	{
		return $this->hasOne('App\Code', 'id', 'parent_id');
	}
	
	public function ScopeMaxId($query)
	{
		return $query->max('id');
	}
}
