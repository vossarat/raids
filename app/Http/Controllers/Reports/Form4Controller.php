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
	
    public function getForm4() 
    {
		if($this->request->isMethod('get')){
            return view('reports.form4.sex.form')->with('referenceRegion', \App\Region::orderBy('id')->get());
        }
		
		$startdate = date("Y-m-d",strtotime($this->request->startdate));
		$enddate = date("Y-m-d",strtotime($this->request->enddate));
		$regionId = $this->request->region;        
        
        $attributes = array(
            'filename' => 'Форма4',
            'view' => 'reports.form4.sex.output',
            'viewdata' => \App\Reports\Form4::getForm4($startdate, $enddate, $regionId),
            'startdate' => $startdate,
            'enddate' =>  $enddate,
            'referenceCode' =>  \App\Code::all(),
            'region' => $regionId ? \App\Region::find($regionId)->name : ' По всем регионам',
        );
        
        if($this->request->output == 'toScreen'){
        	$attributes['layout'] = 'layouts.template';
            return view( $attributes['view'] )->with($attributes);
        }
        
        $attributes['layout'] = 'layouts.excel';
        \App\ReportExcel::reportToExcel($attributes);
	}
}
