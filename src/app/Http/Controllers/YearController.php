<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function index() {
        return view('private.years.year');
    }

    public function getActiveYear() {
        return Year::where('active', 1)->first();
    }
}
