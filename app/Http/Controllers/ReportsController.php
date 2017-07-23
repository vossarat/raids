<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;

class ReportsController extends Controller
{
	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function form4()
	{
		
		if ($this->request->isMethod('post')) {
			
			$startdate = date("Y-m-d",strtotime($this->request->startdate));
	        $enddate = date("Y-m-d",strtotime($this->request->enddate));
	        $region = $this->request->region;
	
			if($this->request->output == 'toScreen'){
				return view('reports.form4_excel')->with([
					'viewdata' => \App\Report::form4($startdate, $enddate, $region),
					'startdate' => $this->request->startdate, 
					'enddate' => $this->request->enddate,
					'region' => $region ? \App\Region::find($region)->name : ' По всем регионам',
					]);
			}
			Excel::create('Форма4',	function($excel) use ($startdate, $enddate, $region)
				{
					$excel->sheet('Форма4', function($sheet) use ($startdate, $enddate, $region)
						{
							$sheet->loadView('reports.form4_excel')
								->withViewdata(\App\Report::form4($startdate, $enddate, $region))
								->withStartdate($this->request->startdate)
								->withEnddate($this->request->enddate)
								->withRegion($region ? \App\Region::find($region)->name : ' По всем регионам')->setPageMargin(1);
						});
				})->export('xls');
		} 
		else {
			return view('reports.form4')->with('referenceRegion', \App\Region::orderBy('id')->get());
		}

	}
}
