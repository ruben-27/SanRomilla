<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;


class ColaboratorController extends Controller
{
    public static function prueba () {
        echo json_encode("hola");
    }

    public static function showInsert() {
        $roles = Role::all();

        return view('private.colaborator.colaboratorForm',compact("roles"));
    }

    public function store(Request $request) {
        
        $colaborator = new User();
        $request->validate([
            'name' => ['required','max:50'],
            'last_name' => ['required','max:100'],
            'email' => ['required','max:100'],
        ], [
            'name.required' => 'El nombre es obligatorio',
            'last_name.required' => 'El apellido es obligatorio',
            'email.required' => 'El correo es obligatorio'
        ]); 
        $colaborator->name = $_REQUEST["name"];
        $colaborator->last_name = $_REQUEST["last_name"];
        $colaborator->email = $_REQUEST["email"];
       
        $saved = $colaborator->save();
        foreach ($request->roles as $key => $role) {
            $colaborator->roles()->attach(
                $role
            );
        }

        if (!$saved) {
            return redirect('/colaborator')->with("error","fallo al introducir el formulario");
        } else {
            return redirect('/colaborator');
        }  
    }
    
    public static function datatable() {
        echo json_encode("datatable");
    }

    public static function ShowEdit() {
        echo json_encode("ShowEdit");
    }

    public static function edit() {
        echo json_encode("edit");
    }

    public static function removeAction() {
        echo json_encode("removeAction");
    }

    public static function acceptRemove() {
        echo json_encode("acceptRemove");
    }
}
