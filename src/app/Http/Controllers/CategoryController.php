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
            'last_name' => ['required','max:100'],
            'amount' => ['required','max:999'],
        ], [
            'name.required' => 'El nombre es obligatorio',
            'last_name.required' => 'El apellido es obligatorio'
        ]); 
        $category->name = $_REQUEST["name"];
        $category->last_name = $_REQUEST["last_name"];
        $category->amount = $_REQUEST["amount"];
        if ($_REQUEST["size"]!="No quiere") {
            $category->size = $_REQUEST["size"];
        } else {
            unset($category->size);
        }
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
