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
	
    public function getForm4ByGender() 
    {
    	
		if($this->request->isMethod('get')){
            return view('reports.form4.bygender.form')->with([
            	'referenceRegion' => \App\Region::orderBy('id')->get(),
            	'settings' => \App\Setting::viewdata(),
            ]);
        }
        
		$startdate = date("Y-m-d",strtotime($this->request->startdate));
		$enddate = date("Y-m-d",strtotime($this->request->enddate));
		$regionId = $this->request->region;
		$calcBy = $this->request->calcBy;
		$inParent = $this->request->inParent;
				
        $attributes = array(
            'filename' => 'Форма4',
            'view' => 'reports.form4.bygender.output',
            'viewdata' => \App\Reports\Form4::getForm4ByGender($startdate, $enddate, $regionId, $calcBy, $inParent),
            'startdate' => $this->request->startdate,
            'enddate' =>  $this->request->enddate,
            'referenceCode' =>  \App\Code::orderBy('weight')->get(),
            'region' => $regionId ? \App\Region::find($regionId)->name : ' По всем регионам',
            'city' => $calcBy ? $this->addCityReportName(\App\City::find($calcBy)->name) : ' ИТОГО',
           /* 'inParent' => $inParent ? ' В составе'  : '',*/
        );
        
        if($this->request->output == 'toScreen'){
        	$attributes['layout'] = 'layouts.report_to_screen';
            return view( $attributes['view'] )->with($attributes);
        }
        
        $attributes['layout'] = 'layouts.report_to_excel';
        \App\ReportExcel::reportToExcel($attributes);
	}
	
	public function getForm4ByComparison() 
    {	
    	
		if($this->request->isMethod('get')){
            return view('reports.form4.bycomparison.form')->with([
            	'referenceRegion' => \App\Region::orderBy('id')->get(),
            	'settings' => \App\Setting::viewdata(),
            ]);
        }
		
		$startdate = date("Y-m-d",strtotime($this->request->startdate));
		$enddate = date("Y-m-d",strtotime($this->request->enddate));
		$regionId = $this->request->region;
		
		
        $attributes = array(
            'filename' => 'Форма4_в_сравнении',
            'view' => 'reports.form4.bycomparison.output',
            'viewdata' => \App\Reports\Form4::getForm4ByComparison($startdate, $enddate, $regionId),
            'startdate' => $this->request->startdate,
            'enddate' =>  $this->request->enddate,
            'referenceCode' =>  \App\Code::orderBy('weight')->get(),
            'region' => $regionId ? \App\Region::find($regionId)->name : ' По всем регионам',
        );
        
        if($this->request->output == 'toScreen'){
        	$attributes['layout'] = 'layouts.report_to_screen';
            return view( $attributes['view'] )->with($attributes);
        }
        
        $attributes['layout'] = 'layouts.report_to_excel';
        \App\ReportExcel::reportToExcel($attributes);
	}
	
	public function addCityReportName($name)
	{
		$cityReportName = 'Городские ЛПУ';
		if($name == 'область'){
			$cityReportName = 'Районы';
		}
		return $cityReportName;
	}
}
