<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportExcel extends Model
{
    public static function reportToExcel($attributes)
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
