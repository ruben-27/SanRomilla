<?php

namespace App\Http\Livewire;

use App\Http\Controllers\YearController;
use App\Models\Category;
use App\Models\GeneralData;
use App\Models\Inscription;
use App\Models\Year;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class InscriptionDatatable extends Component
{
    use WithPagination;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public $category = '';
    public $paid = '';

    public $generalData;

    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function render()
    {
        $this->generalData = GeneralData::first();
        $categories = Category::all();
        $activeYear = YearController::getActiveYear();
        $inscriptions = Inscription::query()
            ->select('inscriptions.*', 'categories.name as categoryName')
            ->join('categories', 'categories.id', '=', 'inscriptions.category_id')
            ->search($this->search)
            ->where('category_id', $this->category > 0 ? $this->category : '>', 0)
            ->where('paid', $this->paid != '' ? $this->paid : '>=', 0)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.inscription-datatable', compact('categories', 'inscriptions', 'activeYear'));
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

    public function inInscriptionsDate() {
        $today = Carbon::today();
        if ($this->generalData->start_date_inscription < $today && $this->generalData->end_date_inscription > $today)
            return true;
        return false;
    }

    public function maxPeople() {
        $people = Inscription::all()->count();
        if ($this->generalData->max_people > $people)
            return true;
        return false;
    }
}
