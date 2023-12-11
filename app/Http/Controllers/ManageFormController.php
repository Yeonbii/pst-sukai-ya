<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Part;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageFormController extends Controller
{
    
    public function index(Request $request) {

        $filter_part = 'Filter';
        $search = $request->input('search');
        if (request('part')) {
            $part = Part::firstWhere('code', request('part'));
            $filter_part = 'Filter : ' . $part->name;
        }

        $questions = Question::with('part', 'options')->orderBy('part_id')->orderBy('no')->filter(request(['search', 'part']));
        $total = $questions->count();

        return view('dashboard.manage-forms.index', [
            'parts' => Part::all(),
            'questions' => $questions->simplePaginate(5)->withQueryString(),
            'filter_part' => $filter_part,
            'search' => $search,
            'total' => $total
        ]);
    }

    public function show() {
        return view('dashboard.manage-forms.show');
    }

    public function create(Part $part) {
        
        $count = $part->questions()->count() + 1;
        
        return view('dashboard.manage-forms.create', [
            'part' => $part,
            'count' => $count
        ]);
    }

    public function storeQuestion(Request $request, Part $part) {
        // dd($request, $part);
   
        $validatedData = $request->validate([
            'no' => 'required|numeric',
            'text' => 'required',
            'is_required' => 'required',
            'need_note' => 'required',
            'note' => 'required',
            'input_type' => 'required',
            'maks_char' => 'required|numeric|between:0,50',
            'has_other' => 'required',
            'option_number' => 'required|numeric|between:0,30',
            'has_chart' => 'required'
        ]);

        $validatedData['part_id'] = $part->id;

        // Proses untuk mengubah no pada question dengan part yang dipilih jika user menginputkan no yang lebih rendah
        $total = $part->questions()->count() + 1;

        if ($validatedData['no'] < $total) {
            Question::where('part_id', $part->id)
                ->where('no', '>=', $validatedData['no'])
                ->update(['no' => DB::raw('no + 1')]);
        }
        // Proses Selesai

        $question = Question::create($validatedData);

        // Proses menginputkan data secara automatis ketika user mimilih input_type berikut
        // 5 -> Select : (Pilih salah satu)
        if ($validatedData['input_type'] == '5') {
            for ($i = 1; $i <= $validatedData['option_number']; $i++) {
                
                Option::create([
                    'question_id' => $question->id,
                    'no' => $i,
                    'text' => '-',
                    'value' => '-'
                ]);
            }
        }

        // 6 -> Select : Liketr Scale (Contoh 1. Sangat Setuju, 2. Setuju, ...)
        else if ($validatedData['input_type'] == '6') {
            for ($i = 1; $i <= 4; $i++) {
                
                Option::create([
                    'question_id' => $question->id,
                    'no' => $i,
                    'text' => '-',
                    'value' => strval($i)
                ]);
            }
        }

        DB::transaction(function () use ($validatedData, $question) {
            if ($validatedData['has_chart'] == '1') {
                Chart::create([
                    'question_id' => $question->id,
                    'no' => Chart::count() + 1,
                    'show' => '0'
                ]);
            }
        });

        return redirect('/dashboard/manage-form')->with('success','New question has been added!');

    }

    public function edit(Question $question) {
        $count = Question::where('part_id', $question->part_id)->count();
        
        return view('dashboard.manage-forms.edit', [
            'count' => $count,
            'question' => $question
        ]);
    }

    public function updateQuestion(Request $request, Question $question) {
        // dd($request, $question);

        $validatedData = $request->validate([
            'no' => 'required|numeric',
            'text' => 'required',
            'is_required' => 'required',
            'need_note' => 'required',
            'note' => 'required',
            'input_type' => 'required',
            'maks_char' => 'required|numeric|between:0,50',
            'has_other' => 'required',
            'option_number' => 'required|numeric|between:0,30',
            'has_chart' => 'required'
        ]);

        $validatedData['part_id'] = $question->part_id;

        // Proses untuk mengubah no pada question dengan part yang dipilih
        if ($validatedData['no'] != $question->no) {
            if ($validatedData['no'] < $question->no) {
                // Ketika no berubah menjadi lebih kecil
                Question::where('part_id', $validatedData['part_id'])
                    ->where('no', '>=', $validatedData['no'])
                    ->where('no', '<', $question->no)
                    ->update(['no' => DB::raw('no + 1')]);
            } else {
                // Ketika no berubah menjadi lebih besar
                Question::where('part_id', $validatedData['part_id'])
                    ->where('no', '<=', $validatedData['no'])
                    ->where('no', '>', $question->no)
                    ->update(['no' => DB::raw('no - 1')]);
            }
        }

        if($validatedData['input_type'] != $question->input_type) {
            if($question->input_type == '5' || $question->input_type == '6') {
                // Jika sebelumnnya input_type = 5 atau 6, kemudian berubah
                Option::where('question_id', '=', $question->id)->delete();
            }
            
            // Proses menginputkan data secara automatis ketika user mimilih input_type berikut
            // 5 -> Select : (Pilih salah satu)
            if ($validatedData['input_type'] == '5') {
                for ($i = 1; $i <= $validatedData['option_number']; $i++) {
                
                    Option::create([
                        'question_id' => $question->id,
                        'no' => $i,
                        'text' => '-',
                        'value' => '-'
                    ]);
                }
            }
            
            // 6 -> Select : Liketr Scale (Contoh 1. Sangat Setuju, 2. Setuju, ...)
            else if($validatedData['input_type'] == '6') {
                for ($i = 1; $i <= 4; $i++) {
                
                    Option::create([
                        'question_id' => $question->id,
                        'no' => $i,
                        'text' => '-',
                        'value' => strval($i)
                    ]);
                }
            }

        } else {
            // Jika input_type sama tetapi option_number berubah
            if($validatedData['option_number'] != $question->option_number) {
                // 5 -> Select : (Pilih salah satu)
                if ($validatedData['input_type'] == '5') {
                    for ($i = 1; $i <= $validatedData['option_number']; $i++) {
                    
                        Option::create([
                            'question_id' => $question->id,
                            'no' => $i,
                            'text' => '-',
                            'value' => '-'
                        ]);
                    }
                }
                // 6 -> Select : Liketr Scale (Contoh 1. Sangat Setuju, 2. Setuju, ...)
                else if($validatedData['input_type'] == '6') {
                    for ($i = 1; $i <= 4; $i++) {
                    
                        Option::create([
                            'question_id' => $question->id,
                            'no' => $i,
                            'text' => '-',
                            'value' => strval($i)
                        ]);
                    }
                }
            }
        }

        if ($validatedData['has_chart'] != $question->has_chart) {
            if ($question->has_chart == '1') {
                // Jika sebelumnya has_chart = 1 kemudian berubah
                DB::transaction(function () use ($question) {
                    $chartNo = optional($question->chart)->no;
        
                    if (!is_null($chartNo)) {
                        Chart::where('no', '>', $chartNo)->update(['no' => DB::raw('no - 1')]);
                    }
        
                    Chart::where('question_id', '=', $question->id)->delete();
                });
            } else {
                // Jika sebelumnya has_chart = 0 kemudian berubah
                DB::transaction(function () use ($question) {
                    Chart::create([
                        'question_id' => $question->id,
                        'no' => Chart::count() + 1,
                        'show' => '0'
                    ]);
                });
            }
        } 
        
        Question::where('id', $question->id)->update($validatedData);

        return redirect('/dashboard/manage-form')->with('success','Question has been updated!');

    }

    public function selection() {
        return view('dashboard.manage-forms.selection');
    }

    // Test table
    public function test123() {
        return view('test', [
            'questions' => Question::with('part', 'options')->orderBy('part_id')->orderBy('no')->get()
        ]);
    }

}
