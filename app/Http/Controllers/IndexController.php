<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Register;
use App\City;
use App\Sex;
use App\Region;
use App\Diagnose;
use App\Code;


class IndexController extends Controller
{
	public function __construct(Register $register, City $city, Sex $sex, Region $region , Diagnose $diagnose, Code $code)
	{
		$this->register = $register;
		$this->city = $city;
		$this->sex = $sex;
		$this->region = $region;
		$this->diagnose = $diagnose;
		$this->code = $code;
	}

	/**
	* Отображение таблицы регистра больных ВИЧ
	* @param Request
	* Request проверяется на наличие данных по фильтрации
	* если filter (кнопка фильтр была нажата), то данные фильтруются
	*
	* @return \Illuminate\Http\Response 
	*/
	public function index(Request $request)
	{
		$patients = $this->register; //экземпляр класса Register
 		$filterSex = null; // фильтра по полу пока нет
		$filterCity = null;// фильтра по городу пока нет
		$filterRegion = null;// фильтра по региону/ЛПУ пока нет
		
		if( $request->has('filter') ) {	// проверка на кнопку фильтра		
			$filterSex = $request->get('sex');
			$filterCity = $request->get('city');
			$filterRegion = $request->get('region');
			$patients = $this->register->sexId($filterSex)->cityId($filterCity)->regionId($filterRegion); //фильтруем данные
		}
 		
		return view('index.index')->with([
				'viewdata' => $patients->orderBy('grantdate','desc')->orderBy('number','desc')->paginate(10),
				'referenceCity' => $this->city->all(),
				'referenceSex' => $this->sex->all(),
				'referenceRegion' => $this->region->all(),
				'referenceDiagnose' => $this->diagnose->all(),
				'referenceCode' => $this->code->orderBy('weight')->get(),				
				
				'filterSex' => $filterSex,
				'filterCity' => $filterCity,
				'filterRegion' => $filterRegion,
			]);
	}
	
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		return view('index.create')->with([
				'referenceSex' => $this->sex->all(),		
				'referenceCity' => $this->city->all(),		
				'referenceRegion' => $this->region->all(),		
				'referenceDiagnose' => $this->diagnose->all(),
				'referenceCode' => $this->code->orderBy('weight')->get(),
				'newNumber' => $this->register->newNumber()->number + 1,
			]);
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(RegisterRequest $request)
	{
		//dd($request->modifyRequest());
		Register::create($request->modifyRequest());
		return redirect(route('index.index'))->with('message','Пациент добавлен');
	}

	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id)
	{
		//
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function edit($id)
	{
		$patient = $this->register->find($id);
		return view('index.edit')->with([
				'referenceSex' => $this->sex->all(),		
				'referenceCity' => $this->city->all(),
				'referenceRegion' => $this->region->all(),		
				'referenceDiagnose' => $this->diagnose->all(),
				'referenceCode' => $this->code->orderBy('weight')->get(),
				'viewdata' => $patient,
				'newNumber' => $patient->number,		
			]);
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function update(RegisterRequest $request, $id)
	{
		$patient=$this->register->find($id);
		
		//dd($request->modifyRequest());	
		
		$patient->update($request->modifyRequest());
		$patient->save();
		return redirect(route('index.index'))->with('message',"Информация по пациенту $patient->surname изменена");
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id)
	{
		$patient = $this->register->find($id);
		$patient->delete();
		return back()->with('message',"Информация по пациенту $patient->FIO удалена");
	}
}
