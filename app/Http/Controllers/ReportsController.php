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
        if($this->request->isMethod('get')){
            return view('reports.form4')->with('referenceRegion', \App\Region::orderBy('id')->get());
        }
		
		$startdate = date("Y-m-d",strtotime($this->request->startdate));
		$enddate = date("Y-m-d",strtotime($this->request->enddate));
		$regionId = $this->request->region;        
        
        $attributes = array(
            'filename' => 'Форма4',
            'view' => 'reports.form4_output',
            'viewdata' => \App\Report::form4($startdate, $enddate, $regionId),
            'startdate' => $startdate,
            'enddate' =>  $enddate,
            'region' => $regionId ? \App\Region::find($regionId)->name : ' По всем регионам',
        );

        if($this->request->output == 'toScreen'){
            return view( $attributes['view'] )->with($attributes);
        }
        $this->reportToExcel($attributes);
    }

    public function reportToExcel($attributes)
    {
        Excel::create($attributes['filename'],
            function($excel) use ($attributes)
            {
                $excel->sheet($attributes['filename'],
                    function($sheet) use ($attributes)
                    {
                        $sheet->loadView($attributes['view'], $attributes)->setPageMargin(1);
                    });
            })->export('xls');
    }
}
