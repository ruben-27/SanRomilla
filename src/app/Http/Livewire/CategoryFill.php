<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Mark;
use App\Models\Inscription;


class CategoryFill extends Component
{
    public $categoryId;
    public $category; 
    public $marks;
    protected $listeners = [
        'pepe'
    ];
    public function pepe(){
        die();
        $this->category->refresh();
    }
    public function render()
    {
        $this->category = Category::where('id',$this->categoryId)->first();
        $this->marks = Mark::all()->where('category_id',$this->categoryId);
        $this->place = count($this->marks);
        return view('livewire.category-fill');
    }
    public function mount($id)
    {
        $this->categoryId = $id;
    }
}
