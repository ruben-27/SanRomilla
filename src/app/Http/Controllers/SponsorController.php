<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;

class SponsorController extends Controller
{
    public static function showInsert() {
        return view('private.sponsors.sponsorsForm');
    }

    public static function Consult() {
        $donacion = Sponsor::all();
        return $donacion;
    }
    
    public function store(Request $request) {
       
        $sponsor = new Sponsor();
        $request->validate([
            'name' => ['required','max:50'],
            'last_name' => ['required','max:100'],
            'amount' => ['required','max:999'],
        ], [
            'name.required' => 'El nombre es obligatorio',
            'last_name.required' => 'El apellido es obligatorio'
        ]); 
        $sponsor->name = $_REQUEST["name"];
        $sponsor->last_name = $_REQUEST["last_name"];
        $sponsor->amount = $_REQUEST["amount"];
        if ($_REQUEST["size"]!="No quiere") {
            $sponsor->size = $_REQUEST["size"];
        } else {
            unset($sponsor->size);
        }
        $saved = $sponsor->save();
        if (!$saved) {
            return redirect('/sponsor')->with("error","fallo al introducir el formulario");
        } else {
            return redirect('/sponsor');
        }
        
        
    }

    public static function sponsor() {
        echo json_encode("sponsor");
    }
}
