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

        return view('private.colaborators.colaboratorForm',compact("roles"));
    }

    public function modify($id) {
        $roles = Role::all();
        $colaborator = User::where('id',$id)->first();
        return view('private.colaborators.colaboratorForm',compact("colaborator","roles"));
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

    public function store(Request $request) {
        
        // New User
        $colaborator = new User();

        // Save User
        $saved = $this->saveUser($colaborator, $request);

        if (!$saved) {
            return redirect('/colaborator')->with("error","fallo al introducir el formulario");
        } else {
            return redirect('/colaborator');
        } 

    }

    public function update(Request $request) {

        // Find User
        $id = $_REQUEST["id"];
        $colaborator = User::find($id);

        // Save User
        $saved = $this->saveUser($colaborator, $request);

        if (!$saved) {
            return redirect('/colaborator')->with("error","fallo al introducir el formulario");
        } else {
            return redirect('/colaborator');
        } 

    }

    public function saveUser($user, Request $request) {

        // Validations 
        $request->validate([
            'name' => ['required','max:50'],
            'last_name' => ['required','max:100'],
            'email' => ['required','max:100'],
        ], [
            'name.required' => 'El nombre es obligatorio',
            'last_name.required' => 'El apellido es obligatorio',
            'email.required' => 'El correo es obligatorio'
        ]);
        
        // Save User
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;       
        $saved = $user->save();

        foreach ($request->roles as $role) {
            $user->roles()->sync($role, 'detach');
        }

        return $saved;

    }

}