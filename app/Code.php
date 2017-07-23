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
		'weight',
	];
	
	public function ScopeMaxId($query)
	{
		return $query->max('id');
	}
	
}
