<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model{
	protected $fillable = [
		'field', 
		'value', 
	];
    
	public static function viewdata(){
		foreach(self::all() as $setting){
			$viewdata[$setting->field] = $setting->value;
		}
		return $viewdata;
	}	
}
