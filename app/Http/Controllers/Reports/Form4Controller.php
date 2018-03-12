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
            	'referenceCity' => \App\City::orderBy('id')->get(),
            	'settings' => \App\Setting::viewdata(),
            ]);
        }
        
		$startdate = date("Y-m-d",strtotime($this->request->startdate));
		$enddate = date("Y-m-d",strtotime($this->request->enddate));
		$lpuId = $this->request->lpu_id;
		$lpuName = $lpuId ? \App\Region::find($lpuId)->name : ' По всем ЛПУ';
		$calcBy = $this->request->calcBy;
		$cityId = $this->request->residences_id;
		$residencesName = $cityId ? \App\City::find($cityId)->name : ' По всем районам';
		$inParent = $this->request->inParent;
		$cutaway = $this->request->cutaway;
				
        $attributes = array(
            'filename' => 'Форма4',
            'view' => 'reports.form4.bygender.output',
            'viewdata' => \App\Reports\Form4::getForm4ByGender($startdate, $enddate, $lpuId, $calcBy),
            'startdate' => $this->request->startdate,
            'enddate' =>  $this->request->enddate,
            'referenceCode' =>  \App\Code::orderBy('weight')->get(),
            'region' => $lpuName,
            'city' => $residencesName,
            //'city' => $calcBy ? $this->addCityReportName(\App\City::find($calcBy)->name) : ' По всем районам',
            'cutaway' => $cutaway == 1 ? " ЛПУ: $lpuName"  : "Местожительство: $residencesName",
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
