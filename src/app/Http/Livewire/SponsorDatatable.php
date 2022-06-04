<?php

namespace App\Http\Livewire;

use App\Models\Sponsor;
use Livewire\Component;
use Livewire\WithPagination;

class SponsorDatatable extends Component
{
    use WithPagination;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public function render()
    {
        $sponsors = Sponsor::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.sponsor-datatable', compact('sponsors'));
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
