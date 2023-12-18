<?php

namespace App\Http\Controllers;

use App\Models\Ikm;
use App\Models\Question;
use App\Models\Responden;
use Illuminate\Http\Request;

class DataRespondenController extends Controller
{
    
    public function index(Request $request)
    {
        $respondens = Responden::filter(request(['is_read']))->latest();
        $total = $respondens->count();
        $title = '';

        if ($request->has('is_read')) {
            $title = ' - Semua Data Baru';
        }

        return view('dashboard.data-responden.index', [
            'respondens' => $respondens->simplePaginate(10)->withQueryString(),
            'total' => $total,
            'title' => $title
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
                $value = Responden::where('year', $year)->where('month', $month)
                ->join('answers', 'respondens.id', '=', 'answers.responden_id')
                ->where('answers.question_id', '=', $question->id)
                ->sum('answers.value');
                
                $unsur++;

                // Update nilai Ikm
                Ikm::where('year', $year)->where('month', $month)->where('unsur', 'U'.$unsur)->update(['value' => $value]);
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
