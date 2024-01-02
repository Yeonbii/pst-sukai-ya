<?php

namespace App\Exports;

use App\Models\Question;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OpeningSheet implements FromView
{
    public function view(): View
    {
        $questions_i = Question::where('part_id', 1)->orderBy('no')->get();
        $questions_s = Question::where('part_id', 2)->orderBy('no')->get();
        $questions_sv = Question::where('part_id', 3)->orderBy('no')->get();
        $questions_sr = Question::where('part_id', 4)->orderBy('no')->get();
        $questions_f = Question::where('part_id', 5)->orderBy('no')->get();
        $questions_o = Question::where('part_id', 6)->orderBy('no')->get();

        return view('dashboard.data-responden.export-opening', [
            'questions_i' => $questions_i,
            'questions_s' => $questions_s,
            'questions_sv' => $questions_sv,
            'questions_sr' => $questions_sr,
            'questions_f' => $questions_f,
            'questions_o' => $questions_o
        ]);
    }
}
