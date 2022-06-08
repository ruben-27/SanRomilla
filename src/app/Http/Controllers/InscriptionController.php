<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Category;

class InscriptionController extends Controller
{
    public function index() {
        $year = YearController::getActiveYear();
        return view('private.inscriptions.inscription', compact('year'));
    }

    public function store(Request $request) {

        $inscriptions = $_POST["array"];
        $exit = "OK";
        foreach ($inscriptions as $key => $inscription) {
            $inscriptionModel = new Inscription();
            /*$request->validate([
                'name' => ['required','max:50'],
                'last_name' => ['required'],
                'dni' => ['required'],
                'email' => ['required','max:100'],
                'birthday' => ['required'],
                'gender' => ['required'],
                'phone' => ['required'],
                'amount' => ['required'],
                'paid' => ['required'],
                'category' => ['required'],
                'dorsal' => ['required'],
                'size' => ["required"]

            ], [
                'name.required' => 'El nombre es obligatorio',
                'last_name.required' => 'Los apellidos son obligatorios',
                'dni.required' => 'El dni es obligatorio',
                'email.required' => 'El email es obligatorio',
                'birthday.required' => 'La fecha de nacimiento es obligatoria',
                'gender.required' => 'El sexo es obligatorio',
                'phone.required' => 'El telefono es obligatorio',
                'amount.required' => 'La cantidad es obligatoria',
                'paid.required' => 'El precio pagado es obligatorio'
            ]);*/
            $inscriptionModel->name = $inscription[2]["value"];
            $inscriptionModel->last_name = $inscription[3]["value"];
            $inscriptionModel->email = $inscription[4]["value"];
            $inscriptionModel->dni = $inscription[5]["value"];
            $inscriptionModel->phone = $inscription[6]["value"];
            $inscriptionModel->birthday = $inscription[7]["value"];
            $inscriptionModel->gender = $inscription[8]["value"];
            $inscriptionModel->dorsal = $inscription[9]["value"];
            $inscriptionModel->size = $inscription[10]["value"];
            $inscriptionModel->amount = $inscription[11]["value"];
            $inscriptionModel->category_id = $inscription[12]["value"];
            $inscriptionModel->inscription_number = rand(10,100);
            $inscriptionModel->paid = 1;
            $saved = $inscriptionModel->save();
            if(!$saved){
                $exit = "KO";
            }

        }
        echo json_encode($exit);
    }

    public static function showInsert() {
        $categories = Category::all();
        return view('private.inscriptions.inscriptionForm',compact('categories'));
    }

}
