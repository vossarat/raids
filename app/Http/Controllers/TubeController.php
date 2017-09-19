<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;

class TubeController extends Controller
{
	public function index()
	{
		return view('tube.index');
	}

	public function add()
	{
		$pathTmp = $_FILES['filexls']['tmp_name'];
		$pathToCopy = base_path().'/public/files/';
		$fileTableName = $_FILES['filexls']['name'];
		$copyFile = move_uploaded_file($pathTmp, $pathToCopy.'tubes.csv');

		Excel::load('/public/files/tubes.csv', function($reader) {

		    // Getting all results
		    $results = $reader->get();;
		    

		    // ->all() is a wrapper for ->get() and will work the same
		    $results = $reader->first();
			dd($results);
		});
		
		return redirect()->back()->with([
					'message' => "Файл $fileTableName загружен",					
				]);
	}
}
