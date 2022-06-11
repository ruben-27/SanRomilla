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

    public static function showInsert() {
        $roles = Role::all();

        return view('private.colaborators.colaboratorForm',compact("roles"));
    }

    public function modify($id) {
        $roles = Role::all();
        $colaborator = User::where('id',$id)->first();
        return view('private.colaborators.colaboratorForm',compact("colaborator","roles"));
    }

    public function store(Request $request) {

        // New User
        $colaborator = new User();
        $saved = null;
        $userMessage = null;
        /*
        try { 
           
          } catch(\Illuminate\Database\QueryException $ex){ 
            $error = $ex->getMessage(); 
            // Note any method of class PDOException can be called on $ex.
          }*/
        // Save User
        try {
            $saved = $this->saveUser($colaborator, $request);
        } catch (\PDOException $e) {
            $message = explode(' ', $e->getMessage());
            $dbCode = rtrim($message[4], ']');
            $dbCode = trim($dbCode, '[');

            // codes specific to MySQL
            switch ($dbCode)
            {
                case 1049:
                    $userMessage = 'Unknown database - probably config error:';
                    break;
                case 2002:
                    $userMessage = 'DATABASE IS DOWN:';
                    break;
                case 1062:
                    $userMessage = 'El correo ya esta introducido en la base de datos';
                    break;    
                default:
                    $userMessage = $dbCode;
                    break;
            }
            $userMessage = $userMessage;
        }
        
        if (!$saved) {
            return redirect()->back()->with(['error' => $userMessage]);
        } else {
            return redirect(route('colaborator'));
        }

    }

    public function update(Request $request) {

        // Find User
        $id = $_REQUEST["id"];
        $colaborator = User::find($id);

        // Save User
        $saved = $this->saveUser($colaborator, $request);

        if (!$saved) {
            return redirect(route('colaborator'))->with("error","fallo al introducir el formulario");
        } else {
            return redirect(route('colaborator'));
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
