<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function index() {
        $year = $this->getActiveYear();
        return view('private.years.year', compact('year'));
    }

    public function getActiveYear() {
        return Year::where('active', 1)->first();
    }
}
