<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Mark;
use Livewire\WithPagination;

class CategoryEnd extends Component
{
    use WithPagination;
    public $categoryId;
    public $category; 
    public $place;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';

    public function render()
    {
        $this->category = Category::where('id',$this->categoryId)->first();
        $marks = Mark::query()->where('category_id',$this->categoryId)
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.category-end',compact("marks"));
    }
    public function mount($id)
    {
        $this->categoryId = $id;
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc')
            $this->sortDirection = 'desc';
        else
            $this->sortDirection = 'asc';

        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
