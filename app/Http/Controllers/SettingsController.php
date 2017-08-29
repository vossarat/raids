<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Session;

class SettingsController extends Controller
{
	public function index()
	{
		return view('settings.index');
	}

	public function setPeriod(Request $request)
	{
		config([
				'settings.startdate' => $request->startdate,
				'settings.enddate'=> $request->enddate,
			]);
		//Session::set('message', 'Период установлен');
	}
}
