<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ikm;
use App\Models\Chart;
use App\Models\Question;
use App\Models\Responden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    
    public function index(Request $request) 
    {
        // Membersihkan sesi
        session()->forget([
            'form_i', 'form_s', 'form_sv', 'form_sr', 'form_f', 'form_o', 'form_done'
        ]);
        
        // Mengambil waktu sekarang
        $current_date = Carbon::now();
        $month = $current_date->format('m'); 
        $year = $current_date->format('Y');

        // Untuk ditampilkan pada tombol Filter Month
        $filter_month = 'Bulan Ini';

        // Pengechekan apakah terdapat request Filter Month
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
                $m = 'Aug';
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

        // Variabel yang akan digunakan pada kolom Year pada Filter Month
        $oldest_year = $year;

        // Jika terdapat Responden, maka $oldest_year akan mengambil nilai berdasarkan Tahun Pelayan Diterima Terlama pada Entitas Responden
        if(Responden::all()->count() > 0) {
            $oldest_year = Responden::orderBy('year', 'asc')->first()->year;
        }

        // Menjumlahkan semua value untuk Tahun dan Bulan yang sama kemudian dikali 25 sesuai dengan rumus IKM yang diberikan
        $ikm = Ikm::where('year', $year)->where('month', $month)->sum('value');
        $ikm_result = number_format($ikm * 25, 2);

        // Mengambil data Chart yang mempunya show = 1 (Yes, ditampilkan)
        $charts = Chart::with('question')->where('show', 1)->orderBy('no')->get();
        
        // Variabel Array yang akan digunakan untuk warna Pie Chart
        $colors = [
            '#0ea5e9', // Sky
            '#f43f5e', // Rose
            '#a855f7', // Purple
            '#14b8a6', // Teal
            '#ec4899', // Pink
            '#f97316', // Orange
            '#3b82f6', // Blue
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

    public function chart(Request $request) 
    {
        $charts = Chart::with('question')->orderBy('no')->filter(request(['search']));
        $total = Chart::all()->count();
        $search = $request->input('search');

        return view('dashboard.manage-chart.index', [
            'charts' => $charts->simplePaginate(10)->withQueryString(),
            'total' => $total,
            'search' => $search
        ]);
    }

    public function changeShow(Chart $chart)
    {
        if ($chart->show == '1') {
            Chart::where('id', $chart->id)->update([
                'show' => '0'
            ]);
        } else {
            Chart::where('id', $chart->id)->update([
                'show' => '1'
            ]);
        }
        
        return redirect()->back();
    }

    public function edit(Chart $chart)
    {
        return view('dashboard.manage-chart.edit', [
            'chart' => $chart
        ]);
    }

    public function update(Request $request, Chart $chart)
    {
        $validatedData = $request->validate([
            'no' => 'required|numeric',
            'show' => 'required',
        ]);

        // Jika ternyata tidak ada yang berganti
        if (($validatedData['no'] == $chart->no) && ($validatedData['show'] == $chart->show)) {
            return redirect('/dashboard/manage-chart')->with('nothing','None of the charts have been updated!');
        }

        if ($validatedData['no'] < $chart->no) {
            // Ketika no berubah menjadi lebih kecil
            Chart::where('no', '>=', $validatedData['no'])
                ->where('no', '<', $chart->no)
                ->update(['no' => DB::raw('no + 1')]);
        } 
        elseif ($validatedData['no'] > $chart->no) {
            // Ketika no berubah menjadi lebih besar
            Chart::where('no', '<=', $validatedData['no'])
                ->where('no', '>', $chart->no)
                ->update(['no' => DB::raw('no - 1')]);
        }

        Chart::find($chart->id)->update($validatedData);

        return redirect('/dashboard/manage-chart')->with('success','Charts has been updated!');
    
    }

    public function destroy(Chart $chart)
    {
        // Memperbaharui nilai no pada semua data chart
        DB::transaction(function () use ($chart) {
            $chartNo = $chart->no;

            if (!is_null($chartNo)) {
                Chart::where('no', '>', $chartNo)->update(['no' => DB::raw('no - 1')]);
            }
            
        });

        // Memperbaharui Pertanyaan yang berhubungan pada chart ingin dihapus
        Question::find($chart->question_id)->update([
            'has_chart' => '0' // Tidak
        ]);
    
        Chart::find($chart->id)->delete();
    
        return redirect('/dashboard/manage-chart')->with('success','Charts has been deleted!');
    }

}
