<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ikm;
use App\Models\Responden;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index(Request $request) {
        session()->forget('form_i');
        session()->forget('form_s');
        session()->forget('form_sv');
        session()->forget('form_sr');
        session()->forget('form_f');
        session()->forget('form_o');
        session()->forget('form_done');

        $oldest_year = Responden::orderBy('year', 'asc')->first()->year;
        $current_date = Carbon::now();
        $month = $current_date->format('m'); 
        $year = $current_date->format('Y');
        $filter_month = 'Bulan Ini';

        $check_month = $request->has('month');
        if ($check_month) {
            $month = request('month');
            $year = request('year');
            
            if ($month == '01') {
                $m = 'Jan';
            } elseif ($month == '02') {
                $m = 'Feb';
            } elseif ($month == '03') {
                $m = 'Mar';
            } elseif ($month == '04') {
                $m = 'Apr';
            } elseif ($month == '05') {
                $m = 'May';
            } elseif ($month == '06') {
                $m = 'Jun';
            } elseif ($month == '07') {
                $m = 'Jul';
            } elseif ($month == '08') {
                $m = 'Agt';
            } elseif ($month == '09') {
                $m = 'Sept';
            } elseif ($month == '10') {
                $m = 'Oct';
            } elseif ($month == '11') {
                $m = 'Nov';
            } elseif ($month == '12') {
                $m = 'Dec';
            } else {
                $m = $month;
            }

            $filter_month = $m . ' ' . $year;
        }

        $ikm = Ikm::where('year', $year)->where('month', $month)->sum('value');
        $ikm_result = $ikm * 25;

        return view('dashboard.index', [
            'respondens' => Responden::where('year', $year)->where('month', $month),
            'ikm_result' => $ikm_result,
            'oldest_year' => $oldest_year,
            'year' => $year,
            'filter_month' => $filter_month
        ]);
    }

    public function chart() {
        return view('dashboard.manage-chart');
    }

}
