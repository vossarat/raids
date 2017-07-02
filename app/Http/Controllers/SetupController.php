<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setup;

class SetupController extends Controller
{
	public function __construct(Setup $setup)
	{
		$this->setup = $setup;
	}


	public function index()
	{
		$isTableRegister = $this->setup->isTable('register');
		$isReferences = $this->setup->isTable('city');
		return view('setup.index')->with([
				'isTableRegister'=>$isTableRegister,
				'isReferences'=>$isReferences,
			]);
	}

	public function makeTableRegister()
	{
		$message = $this->setup->makeTableRegister();
		return redirect()->back()->withErrors(['create'=>$message]);
	}
	
	public function makeReferences()
	{
		$message = $this->setup->makeReferences();		
		return redirect()->back()->withErrors(['reference'=>$message]);
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
