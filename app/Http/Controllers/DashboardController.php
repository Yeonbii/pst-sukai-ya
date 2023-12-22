<?php

namespace App\Http\Controllers;

use App\Models\Chart;
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

        $oldest_year = '';
        if(Responden::all()->count() > 0) {
            $oldest_year = Responden::orderBy('year', 'asc')->first()->year;
        }
        
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

        $charts = Chart::where('show', 1)->orderBy('no')->get();
        $colors = [
            '#0ea5e9', // Sky
            '#f43f5e', // Rose
            '#a855f7', // Purple
            '#3b82f6', // Blue
            '#14b8a6', // Teal
            '#f97316', // Orange
            '#ec4899', // Pink
            '#8b5cf6', // Violet
            '#ef4444', // Red
            '#10b981', // Emerald
            '#eab308', // Yellow
            '#d946ef', // Fuchsia
            '#6366f1', // Indigo
            '#84cc16', // Lime
            '#06b6d4', // Cyan
            '#22c55e', // Green
            '#f59e0b' // Amber
        ];

        return view('dashboard.index', [
            'respondens' => Responden::where('year', $year)->where('month', $month)->get(),
            'ikm_result' => $ikm_result,
            'oldest_year' => $oldest_year,
            'year' => $year,
            'month' => $month,
            'charts' => $charts,
            'colors' => $colors,
            'filter_month' => $filter_month
        ]);
    }

    public function chart() {
        return view('dashboard.manage-chart');
    }

}
