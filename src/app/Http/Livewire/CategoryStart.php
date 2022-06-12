<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Mark;
use Livewire\WithPagination;

class CategoryStart extends Component
{
    use WithPagination;
    public $categoryId;
    public $category; 
    public $place;
    public $perPage = 10;
    public $buttonView = "n";
    protected $listeners = [
        'stopTime'
    ];
   //
   public function stopTime($value)
   {
       if(!is_null($value)) {
            $time = gmdate("H:i:s", $value);
            $this->place++;
            $dist = ($this->category->distance)/1000; // Distance which is in kilometres(km)
            $mins = $value/60;
            $pace = gmdate("H:i:s", (($mins / $dist)*60));
            $mark = new Mark();
            $mark->place = $this->place;
            $mark->time = $time;
            $mark->pace = $pace;
            $mark->category_id = $this->categoryId;
            $mark->save();
       }    
   }
    public function render()
    {
        $this->category = Category::where('id',$this->categoryId)->first();
        $marks = Mark::query()->where('category_id',$this->categoryId)->paginate($this->perPage);
        $this->place = count($marks);
        return view('livewire.category-start',compact("marks"));
    }
    public function mount($id)
    {
        $this->categoryId = $id;
    }
    public function changeView($status) {
        $this->buttonView = $status;
        $this->category->status = "c";
        $this->category->save();
    }
    public function delete($id) {
        Mark::find($id)->delete();
        $this->place--;
     }
}
