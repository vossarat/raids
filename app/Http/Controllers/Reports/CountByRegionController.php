<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountByRegionController extends Controller
{
	public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    public function getForm()
	{
		if($this->request->isMethod('get')){
            return view('reports.countbyregion.form');
        }
        
        $startdate = date("Y-m-d",strtotime($this->request->startdate));
		$enddate = date("Y-m-d",strtotime($this->request->enddate));
        
        $attributes = array(
            'filename' => 'количество по МО',
            'view' => 'reports.countbyregion.output',
            'viewdata' => \App\Reports\CountByRegion::getForm($startdate, $enddate),
            'startdate' => $this->request->startdate,
            'enddate' =>  $this->request->enddate,
            'referenceRegion' =>  \App\Region::all(),
        );
        
        if($this->request->output == 'toScreen'){
        	$attributes['layout'] = 'layouts.report_to_screen';
            return view( $attributes['view'] )->with($attributes);
        }
        
        $attributes['layout'] = 'layouts.report_to_excel';
        \App\ReportExcel::reportToExcel($attributes);
	}
}
