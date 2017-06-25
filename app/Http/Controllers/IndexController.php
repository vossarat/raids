<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\City;
use App\Sex;

class IndexController extends Controller
{
	public function __construct(Register $register, City $city, Sex $sex)
	{
		$this->register = $register;
		$this->city = $city;
		$this->sex = $sex;
	}

	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index(Request $request)
	{		
		$patients = $this->register;
 		$filterSex = null;
		$filterCity = null;
		
		if( $request->has('filter') ) {			
			$filterSex = $request->get('sex');
			$filterCity = $request->get('city');
			$patients = $this->register->sexId($filterSex)->cityId($filterCity);
		}
 		
		return view('index.index')->with([
				'viewdata'=>$patients->paginate(10),
				'referenceCity'=>$this->city->all(),
				'referenceSex'=>$this->sex->all(),
				'sex'=>$filterSex,
				'city'=>$filterCity,
			]);
	}
	
	/*public function index()
	{
 		$patients = $this->register->paginate(10);
		return view('index.index')->with([
				'viewdata'=>$patients,
				'referenceCity'=>$this->city->all(),
				'referenceSex'=>$this->sex->all(),
			]);
	}*/

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{
		return view('index.create');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request)
	{
		Register::create($request->all());
		return redirect(route('index'))->with('message','Пациент добавлен');
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
		//
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, $id)
	{
		//
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id)
	{
		//
	}
}
