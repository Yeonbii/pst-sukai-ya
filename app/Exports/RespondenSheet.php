<?php

namespace App\Exports;

use App\Models\Question;
use App\Models\Responden;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class RespondenSheet implements FromView, WithTitle
{
    protected $respondens; // Tetap menggunakan $respondens

    public function __construct($respondens) // Menghapus tipenya agar dapat menerima kumpulan objek
    {
        $this->respondens = $respondens; // Tetap menggunakan $respondens
    }

    public function view(): View
    {
        $questions_i = Question::where('part_id', 1)->orderBy('no')->get();
        $questions_s = Question::where('part_id', 2)->orderBy('no')->get();
        $questions_sv = Question::where('part_id', 3)->orderBy('no')->get();
        $questions_sr = Question::where('part_id', 4)->orderBy('no')->get();
        $questions_f = Question::where('part_id', 5)->orderBy('no')->get();
        $questions_o = Question::where('part_id', 6)->orderBy('no')->get();

        $total_i = $questions_i->count();
        $total_s = $questions_s->count();
        $total_sv = $questions_sv->count();
        $total_sr = $questions_sr->count();
        $total_f = $questions_f->count();
        $total_o = $questions_o->count();

        return view('dashboard.data-responden.test', [
            'questions_i' => $questions_i,
            'questions_s' => $questions_s,
            'questions_sv' => $questions_sv,
            'questions_sr' => $questions_sr,
            'questions_f' => $questions_f,
            'questions_o' => $questions_o,
            'total_i' => $total_i,
            'total_s' => $total_s,
            'total_sv' => $total_sv,
            'total_sr' => $total_sr,
            'total_f' => $total_f,
            'total_o' => $total_o,
            'respondens' => $this->respondens,
        ]);
    }

    public function title(): string
    {
        // Sesuaikan judul sheet dengan year dan month dari contoh pertama
        return $this->respondens[0]->year . '-' . $this->respondens[0]->month;
    }
}
