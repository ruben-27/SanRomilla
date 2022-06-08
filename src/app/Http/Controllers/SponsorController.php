<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;

class SponsorController extends Controller
{
    public function index() {
        return view('private.sponsors.sponsors');
    }

    public static function showInsert() {
        return view('private.sponsors.sponsorsForm');
    }

    public static function Consult() {
        $donacion = Sponsor::all();
        return $donacion;
    }

    public function modify($id) {
        $sponsor = Sponsor::where('id',$id)->first();
        return view('private.sponsors.sponsorsForm',compact("sponsor"));
    }

    public function store(Request $request) {

        $sponsor = new Sponsor();


        /* Store $imageName name in DATABASE from HERE */
        $request->validate([
            'name' => ['required','max:50'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'name' => ['required','max:200'],
        ], [
            'name.required' => 'El nombre es obligatorio',
            'image.required' => 'La imagen es obligatoria'
        ]);
        $imageName = $_REQUEST["name"].'.'.$request->image->extension();
        $request->image->move(public_path('images/sponsors/'), $imageName);
        $sponsor->name = $_REQUEST["name"];
        $sponsor->url = $_REQUEST["url"];
        $sponsor->image = $imageName;

        $saved = $sponsor->save();
        if (!$saved) {
            return redirect('/sponsors')->with("error","fallo al introducir el formulario");
        } else {
            return redirect('/sponsors');
        }


    }

    public function update(Request $request) {
        $id = $_REQUEST["id"];
        $sponsor = Sponsor::find($id);
        /* Store $imageName name in DATABASE from HERE */
        $request->validate([
            'name' => ['required','max:50'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'url' => ['required','max:200'],
        ], [
            'name.required' => 'El nombre es obligatorio',
            'image.required' => 'La imagen es obligatoria'
        ]);
        $imageName = $_REQUEST["name"].'.'.$request->image->extension();
        $request->image->move(public_path('images/sponsors/'), $imageName);
        $sponsor->name = $_REQUEST["name"];
        $sponsor->url = $_REQUEST["url"];
        $sponsor->image = $imageName;

        $saved = $sponsor->save();
        if (!$saved) {
            return redirect('/sponsors')->with("error","fallo al introducir el formulario");
        } else {
            return redirect('/sponsors');
        }

    }

    public static function sponsor() {
        echo json_encode("sponsor");
    }
}
