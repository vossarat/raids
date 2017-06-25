<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\City;
use App\Sex;

class FilterController extends Controller
{
	public function __construct(Register $register, City $city, Sex $sex)
	{
		$this->register = $register;
		$this->city = $city;
		$this->sex = $sex;
	}

	public function index(Request $request)
	{
		if ($request->has('filter')) {
			$filterSex = $request->get('sex');
			$filterCity = $request->get('city');
			$patients = $this->register->sexId($filterSex)->cityId($filterCity);
			return view('index.index')->with([
					'viewdata'=>$patients->paginate(10),
					'sex'=>$filterSex,
					'city'=>$filterCity,
					'referenceCity'=>$this->city->all(),
					'referenceSex'=>$this->sex->all(),
				]);
		} else {
			return redirect('/');
		}


	}
}
