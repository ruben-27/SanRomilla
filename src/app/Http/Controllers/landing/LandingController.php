<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Year;

class LandingController extends Controller
{
    public function index() {
        $sponsors = Sponsor::all();
        $years = Year::query()->where("active","1")->first();
        return view('public.index',compact("sponsors","years"));
    }
}
