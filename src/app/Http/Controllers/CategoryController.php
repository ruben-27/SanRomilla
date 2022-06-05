<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public static function showInsert() {
        return view('private.category.categoryForm');
    }

    public static function Consult() {
        $donacion = Category::all();
        return $donacion;
    }
    
    public function store(Request $request) {
       
        $category = new Category();
        $request->validate([
            'name' => ['required','max:50'],
            'min_age' => ['required'],
            'max_age' => ['required'],
            'KM' => ['required','max:100'],
            'start_time' => ['required'],
            'price' => ['required'],
        ], [
            'name.required' => 'El nombre es obligatorio',
            'min_age.required' => 'La edad mínima es obligatoria',
            'max_age.required' => 'La edad máxima es obligatoria',
            'KM.required' => 'La duración de la categoria es obligatoria',
            'name.max' => 'El nombre es demasiado largo',
            'start_time.required' => 'La fecha de comienzo es obligatoria',
            'price.required' => 'El precio es obligatorio'
        ]); 
        $category->name = $_REQUEST["name"];
        $category->min_age = $_REQUEST["min_age"];
        $category->max_age = $_REQUEST["max_age"];
        $category->KM = str_replace(',', '.',$_REQUEST["KM"]);
        $category->start_time = $_REQUEST["start_time"];
        $category->price = str_replace(',', '.',$_REQUEST["price"]);
        $category->status = "W";
        $saved = $category->save();
        if (!$saved) {
            return redirect('/category')->with("error","fallo al introducir el formulario");
        } else {
            return redirect('/category');
        }
        
        
    }

    public function modify($id) {
        $category = Category::where('id',$id)->first();
        return view('private.category.categoryForm',compact("category"));
    }

    public function update(Request $request) {
        $id = $_REQUEST["id"];
        $category = Category::find($id);
        $request->validate([
            'name' => ['required','max:50'],
            'min_age' => ['required'],
            'max_age' => ['required'],
            'KM' => ['required','max:100'],
            'start_time' => ['required'],
            'price' => ['required'],
        ], [
            'name.required' => 'El nombre es obligatorio',
            'min_age.required' => 'La edad mínima es obligatoria',
            'max_age.required' => 'La edad máxima es obligatoria',
            'KM.required' => 'La duración de la categoria es obligatoria',
            'name.max' => 'El nombre es demasiado largo',
            'start_time.required' => 'La fecha de comienzo es obligatoria',
            'price.required' => 'El precio es obligatorio'
        ]);
        
        // Getting values from the blade template form
        $category->name = $_REQUEST["name"];
        $category->min_age = $_REQUEST["min_age"];
        $category->max_age = $_REQUEST["max_age"];
        $category->KM = str_replace(',', '.',$_REQUEST["KM"]);
        $category->start_time = $_REQUEST["start_time"];
        $category->price = str_replace(',', '.',$_REQUEST["price"]);
        $category->status = "W";
        $saved = $category->save();
        if (!$saved) {
            return redirect('/category')->with("error","fallo al introducir el formulario");
        } else {
            return redirect('/category');
        }
        
    }

    public static function category() {
        echo json_encode("category");
    }
}
