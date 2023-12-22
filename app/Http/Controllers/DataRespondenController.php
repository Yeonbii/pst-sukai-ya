<?php

namespace App\Http\Controllers;

use App\Models\Ikm;
use App\Models\Question;
use App\Models\Responden;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DataRespondenController extends Controller
{
    
    public function index(Request $request)
    {
        $respondens = Responden::filter(request(['is_read', 'year', 'month']))->latest();
        $total = $respondens->count();
        $filter_all = '';
        $filter_month = 'Filter Bulan';
        $check_read = $request->has('is_read');
        $check_month = $request->has('month');

        $oldest_year = '';
        if(Responden::all()->count() > 0) {
            $oldest_year = Responden::orderBy('year', 'asc')->first()->year;
        }
        
        $current_date = Carbon::now();
        $year = $current_date->format('Y');

        
        if ($check_read) {
            $filter_all = ' - Semua Data Baru';
        }

        if ($check_month){
            $v_m = request('month');
            $y = request('year');
            if ($v_m == '01') {
                $m = 'Jan';
            } elseif ($v_m == '02') {
                $m = 'Feb';
            } elseif ($v_m == '03') {
                $m = 'Mar';
            } elseif ($v_m == '04') {
                $m = 'Apr';
            } elseif ($v_m == '05') {
                $m = 'May';
            } elseif ($v_m == '06') {
                $m = 'Jun';
            } elseif ($v_m == '07') {
                $m = 'Jul';
            } elseif ($v_m == '08') {
                $m = 'Agt';
            } elseif ($v_m == '09') {
                $m = 'Sept';
            } elseif ($v_m == '10') {
                $m = 'Oct';
            } elseif ($v_m == '11') {
                $m = 'Nov';
            } elseif ($v_m == '12') {
                $m = 'Dec';
            } else {
                $m = $v_m;
            }
            $filter_month = 'Filter: ' . $m . ' ' . $y ;
        }

        return view('dashboard.data-responden.index', [
            'respondens' => $respondens->simplePaginate(10)->withQueryString(),
            'total' => $total,
            'filter_all' => $filter_all,
            'filter_month' => $filter_month,
            'check_read' => $check_read,
            'check_month' => $check_month,
            'oldest_year' => $oldest_year,
            'year' => $year
        ]);
    }

    public function show(Responden $responden)
    {
        $questions_i = $responden->questions->where('part_id', 1);
        $questions_s = $responden->questions->where('part_id', 2);
        $questions_sv = $responden->questions->where('part_id', 3);
        $questions_sr = $responden->questions->where('part_id', 4);
        $questions_f = $responden->questions->where('part_id', 5);
        $questions_o = $responden->questions->where('part_id', 6);

        if ($responden->is_read == '0') {
            Responden::where('id', $responden->id)->update(['is_read' => '1']);
        }

        return view('dashboard.data-responden.show', [
            'responden' => $responden,
            'questions_i' => $questions_i,
            'questions_s' => $questions_s,
            'questions_sv' => $questions_sv,
            'questions_sr' => $questions_sr,
            'questions_f' => $questions_f,
            'questions_o' => $questions_o
        ]);
    }


    public function destroy(Responden $responden)
    {
        $year = $responden->year;
        $month = $responden->month;

        // Menghitung jumlah responden untuk tahun dan bulan tertentu
        $respondensCount = Responden::where('year', $year)->where('month', $month)->count();

        // Menghapus responden
        Responden::destroy($responden->id);

        if ($respondensCount == 1) {
            // Jika ini adalah responden terakhir untuk tahun dan bulan tertentu, hapus juga data Ikm
            Ikm::where('year', $year)->where('month', $month)->delete();

        } else {
            
            $questions = Question::where('part_id', 3)->orderBy('no')->get();
            $unsur = 0;
            foreach($questions as $question) {
                // Jika masih ada responden, hitung ulang nilai Ikm
                $sumValue = Responden::where('year', $year)->where('month', $month)
                ->join('answers', 'respondens.id', '=', 'answers.responden_id')
                ->where('answers.question_id', '=', $question->id)
                ->sum('answers.value');
                
                $result = $sumValue / ($respondensCount * $questions->count());

                $unsur++;

                // Update nilai Ikm
                Ikm::where('year', $year)->where('month', $month)->where('unsur', 'U'.$unsur)->update(['value' => $result]);
            }
            
        }

        return redirect('/dashboard/data-responden')->with('success', 'Responden has been deleted!');
    }


    public function readAll()
    {
        Responden::where('is_read', '0')->update([
            'is_read' => '1',
        ]);

        return redirect()->back();
    }

}
