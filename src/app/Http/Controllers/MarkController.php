<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Category;


class MarkController extends Controller
{
    public function index() {
        $categories = Category::all();
        $year = YearController::getActiveYear();
        return view('private.marks.mark',compact('categories', 'year'));
    }

    public function startCategory($id) {
        return view('private.marks.startCategory',compact('id'));
    }

    public function fillCategory($id) {
        return view('private.marks.fillCategory',compact('id'));
    }
    public function endCategory($id) {
        return view('private.marks.endCategory',compact('id'));
    }
}
