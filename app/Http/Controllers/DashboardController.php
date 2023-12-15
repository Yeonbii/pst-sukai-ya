<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index() {
        session()->forget('form_i');
        session()->forget('form_s');
        session()->forget('form_sv');
        session()->forget('form_sr');
        session()->forget('form_f');
        session()->forget('form_o');
        session()->forget('form_done');
        return view('dashboard.index');
    }

    public function chart() {
        return view('dashboard.manage-chart');
    }

}
