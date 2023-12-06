<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Question;
use Illuminate\Http\Request;

class ManageFormController extends Controller
{
    
    public function index() {
        return view('dashboard.manage-forms.index', [
            'parts' => Part::all()
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
        
    }

    public function selection() {
        return view('dashboard.manage-forms.selection');
    }

}
