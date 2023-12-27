<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Responden;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class RespondensExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */

    /**
     * @return array
     */

    public function sheets(): array
    {
        $sheets = [];
    
        $current_date = Carbon::now();
        $year = $current_date->format('Y');
    
        if (Responden::all()->count() > 0) {
            $oldest_year = Responden::orderBy('year', 'asc')->first()->year;
        }
    
        for ($i = $oldest_year; $i <= $year; $i++) {
            for ($month = 1; $month <= 12; $month++) {
                $respondens = Responden::where('year', strval($i))->where('month', str_pad($month, 2, '0', STR_PAD_LEFT))->get();
    
                if ($respondens->count() > 0) {
                    $sheets[] = new RespondenSheet($respondens);
                }
            }
        }
    
        return $sheets;
    }
     
}