<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Form4Controller extends Controller
{
	public function __construct(Request $request)
    {
        $this->request = $request;
    }
	
    public function index() 
    {
    	dump(__METHOD__);
		if($this->request->isMethod('get')){
            return view('reports.form4')->with('referenceRegion', \App\Region::orderBy('id')->get());
        }
		
		$startdate = date("Y-m-d",strtotime($this->request->startdate));
		$enddate = date("Y-m-d",strtotime($this->request->enddate));
		$regionId = $this->request->region;        
        
        $attributes = array(
            'filename' => 'Форма4',
            'view' => 'reports.form4_output',
            'viewdata' => \App\Reports\Form4::index($startdate, $enddate, $regionId),
            'startdate' => $startdate,
            'enddate' =>  $enddate,
            'region' => $regionId ? \App\Region::find($regionId)->name : ' По всем регионам',
        );

        if($this->request->output == 'toScreen'){
            return view( $attributes['view'] )->with($attributes);
        }
        App\ReportExcel::reportToExcel($attributes);
	}
}
