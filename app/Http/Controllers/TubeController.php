<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Excel;
use DB;
use App\Register;
use App\City;
use App\Sex;
use App\Region;
use App\Diagnose;
use App\Code;
use Session;
use App\Tube;

class TubeController extends Controller
{
	public function __construct(Tube $tube, City $city, Sex $sex, Region $region , Diagnose $diagnose, Code $code)
	{
		$this->tube = $tube; //экземпляр класса Tube
		$this->city = $city;
		$this->sex = $sex;
		$this->region = $region;
		$this->diagnose = $diagnose;
		$this->code = $code;
	}	
		
	public function add()
	{
		$pathTmp = $_FILES['filexls']['tmp_name'];
		$pathToCopy = base_path().'/public/files/';
		$fileTableName = $_FILES['filexls']['name'];
		$copyFile = move_uploaded_file($pathTmp, $pathToCopy.'tubes.xls');

		Excel::load('/public/files/tubes.xls', function($reader) {

		    // Getting all results
		    $results = $reader->get();;
		    

		    // ->all() is a wrapper for ->get() and will work the same
		    $results = $reader->first()->all();
			foreach($results as $result){
				$tube = $result->all();
				DB::table('tubes')->insert([
					'number' => $tube['1'],
					'tube' => $tube['2'],				
					'surname' => $tube['3'],				
					'sex_id' => $tube['4'] == 'м' ? 2 : 3,				
					'birthday' => $tube['5'],				
				]);
			}			
		});
		
		return redirect()->back()->with([
					'message' => "Файл $fileTableName загружен ",					
				]);
	}
	
	public function index()
	{
		$tubes = $this->tube; 
		return view('tube.index')->with([
				'viewdata' => $tubes->all(),
			]);
	}
	
	public function store(RegisterRequest $request) 
	{		
		Register::create($request->modifyRequest('store'));
		
		$tube = $this->tube->find($request->id);
		$tube->delete();
		
		return redirect(route('tube'))->with([
				'message' => "Информация по пациенту $request->surname перенесена",
			]);
		
	}
	
	public function edit($id)
	{
		$tube = $this->tube->find($id);
		
		$latestRegister = \App\Register::latest()->first(); //последняя запись из таблицы Register для копирования данных
		
		$tube->city_id = $latestRegister->city_id;
		$tube->region_id = $latestRegister->region_id;
		$tube->code_id = $latestRegister->code_id;
		$tube->diagnose_id = $latestRegister->diagnose_id;
		
		return view('tube.edit')->with([
			'referenceSex' => $this->sex->all(),
			'referenceCity' => $this->city->all(),
			'referenceRegion' => $this->region->all(),
			'referenceDiagnose' => $this->diagnose->all(),
			'referenceCode' => $this->code->orderBy('weight')->get(),
			'viewdata' => $tube,
			//'newNumber' => $patient->number,
			]);
	}
	
	public function destroy($id)
	{
		$tube = $this->tube->find($id);
		$tube->delete();
		return back()->with('message',"Информация по плашке пациента $tube->surname удалена");
	}
}
