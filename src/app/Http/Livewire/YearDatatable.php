<?php

namespace App\Http\Livewire;

use App\Models\Year;
use Livewire\Component;
use Livewire\WithPagination;

class YearDatatable extends Component
{
    use WithPagination;
    public $sortBy = 'year';
    public $sortDirection = 'desc';
    public $perPage = 10;
    public $search = '';

    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function render()
    {
        $years = Year::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.year-datatable', compact('years'));
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
