<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Register;
use App\City;
use App\Sex;
use App\Region;

class ExcelController extends Controller
{
	
	public function __construct(Register $register)
	{
		$this->register = $register;
	}
	
    public function index()
    {
        /*Excel::create('New file', function($excel) {
		    $excel->sheet('New sheet', function($sheet) {
		        $sheet->loadView('excel.index');
		    });
		});*/
		
		
		
		/*Excel::create('Filename', function($excel) {
			$patients = $this->register;
			$excel->sheet('New sheet', function($sheet) {
		        $sheet->loadView('excel.index')->with('viewdata', $patients->first());;
		    });
		})->export('xls');*/
		
		
		Excel::create('MyFile', function($excel) {
		    $excel->sheet('MySheet', function($sheet) {
		    	$patients = $this->register;
		        $sheet->loadView('excel.index')->with('viewdata', $patients->orderBy('grantdate','desc')->paginate(1000));;
		    });
		})->export('xls');;
    }
}
 