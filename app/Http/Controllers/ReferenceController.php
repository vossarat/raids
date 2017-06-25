<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reference;

class ReferenceController extends Controller
{
	public function __construct(Reference $reference)
	{
		$this->reference = $reference;
	}
    public function index()
	{
		$this->reference->createSex();
		$this->reference->createCity();
		return redirect()->back()->withErrors(['reference'=>'Справочники созданы']);
	}
}
