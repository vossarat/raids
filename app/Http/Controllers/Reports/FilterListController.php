<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterListController extends Controller{
	public function __construct(Request $request){
		$this->request = $request;
	}
    
	public function getForm(){
		if($this->request->isMethod('get')){
			return view('reports.list.form')->with([
				'referenceRegion'=>\App\Region::orderBy('id')->get(),			
				'referenceDiagnose'=>\App\Diagnose::all(),			
				'referenceCode'=>\App\Code::orderBy('weight')->get(),			
			]);
		}
		
		$startdate = date("Y-m-d",strtotime($this->request->startdate));
		$enddate = date("Y-m-d",strtotime($this->request->enddate));
		$region = $this->request->region;
		$code = $this->request->code;
		$diagnose = $this->request->diagnose;
		
		$attributes = array(
			'filename' => 'Список',
			'view' => 'reports.list.output',
			'viewdata' => \App\Register::whereBetween('grantdate', [$startdate, $enddate])
							->where(
								function($query) use ($region){
									if($region){
										$query->where('region_id', '=', $region);
									}
								})
							->where(
								function($query) use ($code){
									if($code){
										$query->where('code_id', '=', $code);
									}
								})
							->where(
								function($query) use ($diagnose){
									if($diagnose){
										$query->where('diagnose_id', '=', $diagnose);
									}
								})
							->paginate(20),
			'startdate' => $this->request->startdate,
			'enddate' =>  $this->request->enddate,
			'region' => $region ? \App\Region::find($region)->name : ' По всем ЛПУ',
			'code' => $code ? \App\Code::find($code)->name : ' По всем кодам',
			'diagnose' => $diagnose ? \App\Diagnose::find($diagnose)->name : ' По всем диагнозам',
		);
        
		if($this->request->output == 'toScreen'){
			$attributes['layout'] = 'layouts.report_to_screen';
			return view( $attributes['view'] )->with($attributes);
		}
        
		$attributes['layout'] = 'layouts.report_to_excel';
		\App\ReportExcel::reportToExcel($attributes);
		
	}
}
