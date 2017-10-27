<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setup;
use DB;

class SetupController extends Controller
{
	public function __construct(Setup $setup)
	{
		$this->setup = $setup;
	}


	public function index()
	{
		$isHasTable = DB::table('migrations')->count();
		//$isHasTable = $this->setup->isTable('city');
		return view('setup.index')->with([
				'isHasTable'=>$isHasTable,
			]);
	}

	public function makeTable()
	{
		$message = $this->setup->makeTable();		
		return redirect()->back()->withErrors(['message'=>$message]);
	}

	public function appendTable()
	{
		$pathTmp = $_FILES['filedbf']['tmp_name'];
		$pathToCopy = base_path().'/public/files/';
		$fileTableName = $_FILES['filedbf']['name'];
		if(move_uploaded_file($pathTmp, $pathToCopy.$fileTableName)) {
			$appendData = $this->setup->appendData($pathToCopy.$fileTableName);
			$this->setup->seedRegister($appendData);
			return redirect()->back()->withErrors(['append'=>'Данные добавлены']);
		}		
	}

}
