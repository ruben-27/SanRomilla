<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;


class ColaboratorController extends Controller
{
    public function index() {
        return view('private.colaborators.colaborator');
    }

}
