<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        session()->flush();
        return view('forms.index');
    }

    public function formIdentity()
    {
        $form_i = session('form_i', []);

        $questions_i = Question::where('part_id', 1)->orderBy('no')->get();
        
        if($questions_i->count() > 0) {
            return view('forms.questions.identity', [
                'questions_i' => $questions_i,
                'form_i' => $form_i
            ]);
        } else {
            return redirect('/form');
        }
    }

    public function storeIdentity(Request $request)
    {
        $questions_i = Question::where('part_id', 1)->orderBy('no')->get();
        $total_question = $questions_i->count();

        $form_i = [];

        for ($i = 1; $i <= $total_question; $i++) {
            // Aturan validasi
            $validationRules = [
                'i_'.$i => ($questions_i[$i-1]->is_required == '1') ? 'required' : 'sometimes',
            ];

            // Validasi
            $form_i += $request->validate($validationRules);
        }

        // dd($form_i);

        session(['form_i' => $form_i]);

        return redirect('/form/s');
    }

    public function formService()
    {
        $form_i = session('form_i', []);
        $form_s = session('form_s', []);

        if (empty($form_i)) {
            return redirect('/form');
        }

        $questions_s = Question::where('part_id', 2)->orderBy('no')->get();

        if($questions_s->count() > 0) {
            return view('forms.questions.service', [
                'questions_s' => $questions_s,
                'form_s' => $form_s
            ]);
        } else {
            return redirect('/form');
        }
    }

    public function storeService(Request $request)
    {
        $questions_s = Question::where('part_id', 2)->orderBy('no')->get();
        $total_question = $questions_s->count();

        $form_s = [];

        for ($i = 1; $i <= $total_question; $i++) {
            // Aturan validasi
            $validationRules = [
                's_'.$i => ($questions_s[$i-1]->is_required == '1') ? 'required' : 'sometimes',
            ];

            // Validasi
            $form_s += $request->validate($validationRules);
        }

        session(['form_s' => $form_s]);

        // dd($form_s);

        return redirect('/form/sv');
    }

    public function formServiceValue()
    {
        $form_s = session('form_s', []);
        $form_sv = session('form_sv', []);

        if (empty($form_s)) {
            return redirect('/form');
        }

        $questions_sv = Question::where('part_id', 3)->orderBy('no')->get();

        if($questions_sv->count() > 0) {
            return view('forms.questions.service-value', [
                'questions_sv' => $questions_sv,
                'form_sv' => $form_sv
            ]);
        } else {
            return redirect('/form');
        }
    }

    public function storeServiceValue(Request $request)
    {
        $questions_sv = Question::where('part_id', 3)->orderBy('no')->get();
        $total_question = $questions_sv->count();

        $form_sv = [];

        for ($i = 1; $i <= $total_question; $i++) {
            // Aturan validasi
            $validationRules = [
                'sv_'.$i => ($questions_sv[$i-1]->is_required == '1') ? 'required' : 'sometimes',
            ];

            // Validasi
            $form_sv += $request->validate($validationRules);
        }

        session(['form_sv' => $form_sv]);

        // dd($form_sv);

        return redirect('/form/sr');
    }

    public function formServiceRate()
    {
        $form_sv = session('form_sv', []);
        $form_sr = session('form_sr', []);

        if (empty($form_sv)) {
            return redirect('/form');
        }

        $questions_sr = Question::where('part_id', 4)->orderBy('no')->get();

        if($questions_sr->count() > 0) {
            return view('forms.questions.service-rate', [
                'questions_sr' => $questions_sr,
                'form_sr' => $form_sr
            ]);
        } else {
            return redirect('/form');
        }
    }

    public function storeServiceRate(Request $request)
    {
        $questions_sr = Question::where('part_id', 4)->orderBy('no')->get();
        $total_question = $questions_sr->count();

        $form_sr = [];

        for ($i = 1; $i <= $total_question; $i++) {
            // Aturan validasi
            $validationRules = [
                'sr_'.$i => ($questions_sr[$i-1]->is_required == '1') ? 'required' : 'sometimes',
            ];

            // Validasi
            $form_sr += $request->validate($validationRules);
        }

        session(['form_sr' => $form_sr]);

        // dd($form_sr);

        return redirect('/form/f');
    }

    public function formFeedback()
    {
        $form_sr = session('form_sr', []);
        $form_f = session('form_f', []);
        
        if (empty($form_sr)) {
            return redirect('/form');
        }

        $questions_f = Question::where('part_id', 5)->orderBy('no')->get();

        if($questions_f->count() > 0) {
            return view('forms.questions.feedback', [
                'questions_f' => $questions_f,
                'form_f' => $form_f
            ]);
        } else {
            return redirect('/form');
        }
    }

    public function storeFeedback(Request $request)
    {
        $questions_f = Question::where('part_id', 5)->orderBy('no')->get();
        $total_question = $questions_f->count();

        $form_f = [];

        for ($i = 1; $i <= $total_question; $i++) {
            // Aturan validasi
            $validationRules = [
                'f_'.$i => ($questions_f[$i-1]->is_required == '1') ? 'required' : 'sometimes',
            ];

            // Validasi
            $form_f += $request->validate($validationRules);
        }

        session(['form_f' => $form_f]);

        return redirect('/form/o');
    }

    public function formOthers()
    {
        $form_f = session('form_f', []);
        $form_o = session('form_o', []);
        
        if (empty($form_f)) {
            return redirect('/form');
        }

        $questions_o = Question::where('part_id', 6)->orderBy('no')->get();

        if($questions_o->count() > 0) {
            return view('forms.questions.others', [
                'questions_o' => $questions_o,
                'form_o' => $form_o
            ]);
        } else {
            return redirect('/form');
        }
    }

    public function storeOthers(Request $request)
    {
        $questions_o = Question::where('part_id', 6)->orderBy('no')->get();
        $total_question = $questions_o->count();

        $form_o = [];

        for ($i = 1; $i <= $total_question; $i++) {
            // Aturan validasi
            $validationRules = [
                'o_'.$i => ($questions_o[$i-1]->is_required == '1') ? 'required' : 'sometimes',
            ];

            // Validasi
            $form_o += $request->validate($validationRules);
        }

        session(['form_o' => $form_o]);

        return redirect('/form/confirm');
    }

    public function confirm()
    {
        $form_i = session('form_i', []);
        $form_s = session('form_s', []);
        $form_sv = session('form_sv', []);
        $form_sr = session('form_sr', []);
        $form_f = session('form_f', []);
        $form_o = session('form_o', []);
        
        if (empty($form_o)) {
            return redirect('/form');
        }

        $questions = Question::orderBy('no')->get();

        if($questions->count() > 0) {
            return view('forms.questions.confirm', [
                'questions' => $questions,
                'form_i' => $form_i,
                'form_s' => $form_s,
                'form_sv' => $form_sv,
                'form_sr' => $form_sr,
                'form_f' => $form_f,
                'form_o' => $form_o
            ]);
        } else {
            return redirect('/form');
        }
    }

}
