<?php

namespace App\Http\Controllers;

use App\Models\Responden;
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

        return view('dashboard.index', [
            'respondens' => Responden::all()
        ]);
    }

    public function chart() {
        return view('dashboard.manage-chart');
    }

}
