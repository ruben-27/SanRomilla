<?php

namespace App\Http\Livewire;

use App\Http\Controllers\YearController;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryDatatable extends Component
{
    use WithPagination;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public $currentYear;

    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function render()
    {
        $this->currentYear = YearController::getActiveYear();
        $categories = Category::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.category-datatable', compact('categories'));
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
