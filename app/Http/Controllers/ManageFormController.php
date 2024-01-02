<?php

namespace App\Http\Controllers;

use App\Models\Ikm;
use Log;
use Carbon\Carbon;
use App\Models\Part;
use App\Models\Chart;
use App\Models\Option;
use App\Models\Archive;
use App\Models\Question;
use App\Models\Responden;
use Illuminate\Http\Request;
use App\Exports\RespondensExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ManageFormController extends Controller
{
    
    public function index(Request $request)
    {
        // Untuk ditampilkan pada tombol Filter Part
        $filter_part = 'Filter Bagian';

        // Mendapatkan nilai search pada request
        $search = $request->input('search');

        // Jika terdapat request part
        if (request('part')) {
            $part = Part::firstWhere('code', request('part'));
            $filter_part = 'Filter Bagian : ' . $part->name;
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

    public function show() 
    {
        $question_i = Question::where('part_id', 1)->orderBy('no')->get();
        $question_s = Question::where('part_id', 2)->orderBy('no')->get();
        $question_sv = Question::where('part_id', 3)->orderBy('no')->get();
        $question_sr = Question::where('part_id', 4)->orderBy('no')->get();
        $question_f = Question::where('part_id', 5)->orderBy('no')->get();
        $question_o = Question::where('part_id', 6)->orderBy('no')->get();

        return view('dashboard.manage-forms.show', [
            'questions_i' => $question_i, 
            'questions_s' => $question_s, 
            'questions_sv' => $question_sv, 
            'questions_sr' => $question_sr, 
            'questions_f' => $question_f, 
            'questions_o' => $question_o 
        ]);
    }

    public function create(Part $part) 
    {
        // + 1 karena akan bertambah 1 pertanyaan baru
        $count = $part->questions()->count() + 1;
        
        return view('dashboard.manage-forms.create', [
            'part' => $part,
            'count' => $count
        ]);
    }

    public function storeQuestion(Request $request, Part $part) 
    {

        $validatedData = $request->validate([
            'no' => 'required|numeric',
            'text' => 'required',
            'is_required' => 'required',
            'need_note' => 'required',
            'note' => 'required',
            'input_type' => 'required',
            'maks_char' => 'required|numeric|between:0,50',
            'option_number' => 'required|numeric|between:0,30',
            'has_chart' => 'required'
        ]);

        $validatedData['part_id'] = $part->id;
        $validatedData['is_locked'] = '0';

        // EXPORT EXCEL START
        if (Responden::count() > 0) {
            
            // Proses konvert data responden ke excel
            $excelFileName = Carbon::now()->format('YmdHis') . '_ARCHIVE_DATA.xlsx';
            Excel::store(new RespondensExport, $excelFileName, 'public');
    
            // Simpan informasi file di entitas Archive
            Archive::create([
                'name' => $excelFileName
            ]);
    
            // Hapus semua data Responden
            $deleteRespondens = Responden::all();
            
            foreach ($deleteRespondens as $deleteResponden) {
                $deleteResponden->delete();
            }

            // Hapus semua data Ikm
            $deleteIkms = Ikm::all();
            
            foreach ($deleteIkms as $deleteIkm) {
                $deleteIkm->delete();
            }

        }
        // EXPORT EXCEL END

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

        // Jika Pertanyaan akan mempunya chart (has_chart = 1), maka akan dibuatkan data baru pada entitas Chart
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

    public function edit(Question $question) 
    {
        // Jika Pertanyaan terkunci (tidak bisa diedit), maka arahkan kembali ke halaman sebelumnya
        if ($question->is_locked == '1') {
            return redirect()->back();
        }

        $count = Question::where('part_id', $question->part_id)->count();
        
        return view('dashboard.manage-forms.edit', [
            'count' => $count,
            'question' => $question
        ]);
    }

    public function updateQuestion(Request $request, Question $question) 
    {

        $validatedData = $request->validate([
            'no' => 'required|numeric',
            'text' => 'required',
            'is_required' => 'required',
            'need_note' => 'required',
            'note' => 'required',
            'input_type' => 'required',
            'maks_char' => 'required|numeric|between:0,50',
            'option_number' => 'required|numeric|between:0,30',
            'has_chart' => 'required'
        ]);

        $validatedData['is_locked'] = '0';

        $validatedData['part_id'] = $question->part_id;

        // EXPORT EXCEL START
        if (Responden::count() > 0) {
            
            // Proses konvert data responden ke excel
            $excelFileName = Carbon::now()->format('YmdHis') . '_ARCHIVE_DATA.xlsx';
            Excel::store(new RespondensExport, $excelFileName, 'public');
    
            // Simpan informasi file di entitas Archive
            Archive::create([
                'name' => $excelFileName
            ]);
    
            // Hapus semua data Responden
            $deleteRespondens = Responden::all();
            
            foreach ($deleteRespondens as $deleteResponden) {
                $deleteResponden->delete();
            }

            // Hapus semua data Ikm
            $deleteIkms = Ikm::all();
            
            foreach ($deleteIkms as $deleteIkm) {
                $deleteIkm->delete();
            }

        }
        // EXPORT EXCEL END

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
            if($question->input_type == '5') {
                // Jika sebelumnnya input_type = 5, kemudian berubah
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
            

        } else {
            // Jika input_type sama tetapi option_number berubah
            if($validatedData['option_number'] != $question->option_number) {
                // 5 -> Select : (Pilih salah satu)
                if ($validatedData['input_type'] == '5') {
                    // JIka nilai option_number baru > option_number lama
                    if ($validatedData['option_number'] > $question->option_number){
                        
                        for ($i = ($question->option_number + 1); $i <= $validatedData['option_number']; $i++) {
                    
                            Option::create([
                                'question_id' => $question->id,
                                'no' => $i,
                                'text' => '-',
                                'value' => '-'
                            ]);
                        }

                    } else {
                        // Jika nilai option_number baru < option_number lama
                        Option::where('question_id', '=', $question->id)
                            ->where('no', '>', $validatedData['option_number'])
                            ->delete();
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

    public function destroy(Question $question) 
    {
        // Jika Pertanyaan terkunci (tidak bisa diedit), maka arahkan kembali ke halaman sebelumnya
        if ($question->is_locked == '1') {
            return redirect()->back();
        }

        // EXPORT EXCEL START
        if (Responden::count() > 0) {
            
            // Proses konvert data responden ke excel
            $excelFileName = Carbon::now()->format('YmdHis') . '_ARCHIVE_DATA.xlsx';
            Excel::store(new RespondensExport, $excelFileName, 'public');
    
            // Simpan informasi file di entitas Archive
            Archive::create([
                'name' => $excelFileName
            ]);
    
            // Hapus semua data Responden
            $deleteRespondens = Responden::all();
            
            foreach ($deleteRespondens as $deleteResponden) {
                $deleteResponden->delete();
            }

            // Hapus semua data Ikm
            $deleteIkms = Ikm::all();
            
            foreach ($deleteIkms as $deleteIkm) {
                $deleteIkm->delete();
            }

        }
        // EXPORT EXCEL END
        

        if ($question->input_type == '5' || $question->input_type == '6') {
            // Hapus data pada entitas Option jika input_type = 5 atau 6
            Option::where('question_id', '=', $question->id)->delete();
        }

        if($question->has_chart == '1') {
            // Hapus data pada entitas Chart jika punya chart
            DB::transaction(function () use ($question) {
                $chartNo = optional($question->chart)->no;
    
                if (!is_null($chartNo)) {
                    Chart::where('no', '>', $chartNo)->update(['no' => DB::raw('no - 1')]);
                }
    
                Chart::where('question_id', '=', $question->id)->delete();
            });
        }


        if (!is_null($question->no)) {
            // Mengurangkan nomor pertanyaan untuk pertanyaan dengan nomor lebih besar yang memiliki part yang sama
            Question::where('part_id', '=', $question->part_id)
                ->where('no', '>', $question->no)
                ->update(['no' => DB::raw('no - 1')]);
        }

        Question::destroy($question->id);

        return redirect('/dashboard/manage-form')->with('success','Question has been deleted!');
    }

    public function editOptions(Question $question) 
    {
        // Jika Pertanyaan terkunci (tidak bisa diedit), maka arahkan kembali ke halaman sebelumnya
        if ($question->is_locked == '1') {
            return redirect()->back();
        }

        if($question->input_type == '5') {
            $input_type = 'Select : (Pilih salah satu)';
        }

        else if($question->input_type == '6') {
            $input_type = 'Select : Liketr Scale (Contoh 1. Sangat Setuju, 2. Setuju, ...)';
        }

        return view('dashboard.manage-forms.edit-options', [
            'question' => $question,
            'input_type' => $input_type,
            'change_option_number' => session('change_option_number', null)
        ]);
    }

    public function storeOptions(Request $request, Question $question) 
    {
        // EXPORT EXCEL START
        if (Responden::count() > 0) {
            
            // Proses konvert data responden ke excel
            $excelFileName = Carbon::now()->format('YmdHis') . '_ARCHIVE_DATA.xlsx';
            Excel::store(new RespondensExport, $excelFileName, 'public');
    
            // Simpan informasi file di entitas Archive
            Archive::create([
                'name' => $excelFileName
            ]);
    
            // Hapus semua data Responden
            $deleteRespondens = Responden::all();
            
            foreach ($deleteRespondens as $deleteResponden) {
                $deleteResponden->delete();
            }

            // Hapus semua data Ikm
            $deleteIkms = Ikm::all();
            
            foreach ($deleteIkms as $deleteIkm) {
                $deleteIkm->delete();
            }

        }
        // EXPORT EXCEL END


        $change = 0;
        if ($question->input_type == '5') {
            $number = $question->option_number;
        }
        else if ($question->input_type == '6') {
            $number = 4;
        }

        for ($i=1; $i <= $number; $i++) {
            $validatedData = $request->validate([
                'no_'.$i => 'required|numeric',
                'option_'.$i => 'required', // option->text
            ]);

            // Jika input teks nya berbeda dari nilai yang lama
            if ($validatedData['option_'.$i] != $question->options[$i-1]->text) {
                $storeOption = [
                    'question_id' => $question->id,
                    'no' => $validatedData['no_' . $i],
                    'text' => $validatedData['option_' . $i],
                ];

                // Select : (Pilih salah satu)
                if ($question->input_type == '5') {
                    $storeOption['value'] = $validatedData['option_'.$i];
                } 
                
                if ($question->input_type == '6') {
                    // Select : Liketr Scale (Contoh 1. Sangat Setuju, 2. Setuju, ...)
                    $storeOption['value'] = strval($i);
                }

                Option::where('id', $question->options[$i-1]->id)->update($storeOption);
                $change++;
            }
        }

        if ($change == 0) {
            // Jika tidak ada yang diubah
            return redirect('/dashboard/manage-form')->with('nothing','None of the options have been updated!');
        } else {
            return redirect('/dashboard/manage-form')->with('success','Options has been updated!');
        }
    }

}
