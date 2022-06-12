<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Mark;

class CategoryStart extends Component
{
    public $categoryId;
    public $category; 
    public $marks; 
    public $buttonView = true;
    protected $listeners = [
        'stopTime'
    ];
   //
   public function stopTime($value)
   {
       if(!is_null($value)) {
            $dist = ($this->category->distance)/1000; // Distance which is in kilometres(km)
            $mins = \Carbon\Carbon::createFromTimestampUTC($value)->diffInMinutes();
            $ts = ($dist / $mins) * 3600; // in seconds
            $mark = new Mark();
            $mark->time = $value;
            $mark->pace = $ts;
            $mark->category_id = $this->categoryId;
            $mark->save();    
       }    
   }
    public function render()
    {
        $this->category = Category::where('id',$this->categoryId)->first();
        $this->marks = Mark::all()->where('category_id',$this->categoryId);
        return view('livewire.category-start');
    }
    public function mount($id)
    {
        $this->categoryId = $id;
    }
    public function changeView() {
        $this->buttonView = !$this->buttonView;
    }
    public function delete($id) {
        Mark::find($id)->delete();
     }
}
