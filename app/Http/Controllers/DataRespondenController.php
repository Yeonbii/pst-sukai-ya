<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ikm;
use App\Models\Question;
use App\Models\Responden;
use Illuminate\Http\Request;
use App\Exports\RespondensExport;
use Maatwebsite\Excel\Facades\Excel;

class DataRespondenController extends Controller
{
    
    public function index(Request $request)
    {
        // Mengambil semua data responden yang diurutkan berdasarkan waktu terbaru
        $respondens = Responden::filter(request(['is_read', 'year', 'month']))->latest();
        $total = $respondens->count();
        
        // Digunakan untuk tampilam Judul Halaman, '' jika belum terjadi filter
        $filter_all = '';

        // Digunakan untuk tampilan tombol Filter Month
        $filter_month = 'Filter Bulan';
        
        // Mengambil nilai waktu sekarang
        $current_date = Carbon::now();
        $year = $current_date->format('Y');
        $month = $current_date->format('m');
          
        // Pengecekan apakah ada request is_read
        $check_read = $request->has('is_read');
        if ($check_read) {
            $filter_all = ' - Semua Data Baru';
        }
        
        // Pengecekan apakah ada request month
        $check_month = $request->has('month');
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
                $m = 'Aug';
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

        // Variabel yang akan digunakan pada kolom Year pada Filter Month
        $oldest_year = $year;

        // Jika terdapat Responden, maka $oldest_year akan mengambil nilai berdasarkan Tahun Pelayan Diterima Terlama pada Entitas Responden
        if(Responden::all()->count() > 0) {
            $oldest_year = Responden::orderBy('year', 'asc')->first()->year;
        }

        return view('dashboard.data-responden.index', [
            'respondens' => $respondens->simplePaginate(10)->withQueryString(),
            'total' => $total,
            'filter_all' => $filter_all,
            'filter_month' => $filter_month,
            'check_read' => $check_read,
            'check_month' => $check_month,
            'oldest_year' => $oldest_year,
            'year' => $year,
            'month' => $month
        ]);
    }

    public function show(Responden $responden)
    {
        $questions_i = $responden->questions->where('part_id', 1)->sortBy('no');
        $questions_s = $responden->questions->where('part_id', 2)->sortBy('no');
        $questions_sv = $responden->questions->where('part_id', 3)->sortBy('no');
        $questions_sr = $responden->questions->where('part_id', 4)->sortBy('no');
        $questions_f = $responden->questions->where('part_id', 5)->sortBy('no');
        $questions_o = $responden->questions->where('part_id', 6)->sortBy('no');

        // Memperbahrui nilai is_read data responden yang dipilih menjadi is_read = 1 (Sudah dibaca)
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

        // Menghapus responden
        Responden::destroy($responden->id);
        
        // Menghitung jumlah responden untuk tahun dan bulan tertentu
        $respondensCount = Responden::where('year', $year)->where('month', $month)->count();


        if ($respondensCount == 0) {
            // Jika sudah tidak ada data responden, hapus juga data Ikm
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
        // Memperbaharui semua nilai is_read Responden yang bernilai '0' (belum dibaca) menjadi '1' (Sudah dibaca)
        Responden::where('is_read', '0')->update([
            'is_read' => '1',
        ]);

        return redirect()->back();
    }

    public function export()
    { 
        $total = Responden::all()->count();

        // JIka tidak ada responden
        if ($total == 0) {
            return redirect()->back()->with('nothing', 'No responden found.');
        }

        return Excel::download(new RespondensExport, Carbon::now()->format('YmdHis') . '_DATA_RESPONDEN.xlsx');
    }

}
