<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Schema;
use Artisan;
use App\Setting;

class SettingsController extends Controller
{
	public function index()
	{
		if(Schema::hasTable('settings')){
/*			foreach(Setting::all() as $setting){
				$viewdata[$setting->field] = $setting->value;
			}*/
			return view('settings.index')->with('viewdata', Setting::viewdata());
		} 
		Artisan::call('migrate', array('--path' => 'database/migrations/setting'));
		return view('settings.index');	
	}

	public function setPeriod(Request $request)
	{
		$this->update('startdate', $request->startdate);
		$this->update('enddate', $request->enddate);
		return redirect(route('settings'))->with('message',"Период установлен");
	}
	
	public function update($field, $value)
	{
		if( Setting::where('field',$field)->count() == 0 ) $this->create($field);
		Setting::where('field', $field)->update(['value' => $value]);
	}
	
	public function create($field)
	{
		Setting::create(['field' => $field]);
	}
}
