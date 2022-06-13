<?php

namespace App\Http\Livewire\Modal\Years;

use App\Models\Category;
use App\Models\Inscription;
use App\Models\Year;
use LivewireUI\Modal\ModalComponent;

class EndYear extends ModalComponent
{
    public $year;

    public function render()
    {
        return view('livewire.modal.years.end-year');
    }

    public function mount($year)
    {
        $this->year = Year::find($year);
    }

    public function endYear() {
        Inscription::where('id', 'like', '%%')->delete();
        $categories = Category::all();
        foreach ($categories as $category) {
            $category->status = 'n';
            $category->save();
        }
        $this->year->active = 0;
        $this->year->save();
        $this->closeModal();
        $this->emit('refreshParent');
    }
}
