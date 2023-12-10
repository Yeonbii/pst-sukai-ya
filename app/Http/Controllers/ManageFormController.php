<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Question;
use Illuminate\Http\Request;

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
        dd($request, $part);

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
