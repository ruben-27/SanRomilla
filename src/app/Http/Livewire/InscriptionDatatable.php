<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Inscription;
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

    public function render()
    {
        $categories = Category::all();
        $inscriptions = Inscription::query()
            ->select('inscriptions.*', 'categories.name as categoryName')
            ->join('categories', 'categories.id', '=', 'inscriptions.category_id')
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->where('category_id', $this->category > 0 ? $this->category : '>', 0)
            ->paginate($this->perPage);
        return view('livewire.inscription-datatable', compact('categories', 'inscriptions'));
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

    public function delete($id) {
        Inscription::find($id)->delete();
    }

    public function payInscription($id) {
        $inscription = Inscription::find($id);
        if ($inscription->paid == 1)
            $inscription->paid = 0;
        else
            $inscription->paid = 1;
        $inscription->save();
    }
}
