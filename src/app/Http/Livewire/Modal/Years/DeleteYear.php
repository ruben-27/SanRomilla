<?php

namespace App\Http\Livewire\Modal\Years;

use App\Models\Category;
use App\Models\Inscription;
use App\Models\Year;
use LivewireUI\Modal\ModalComponent;

class DeleteYear extends ModalComponent
{
    public $year;

    public function mount($year)
    {
        $this->year = Year::find($year);
    }

    public function render()
    {
        return view('livewire.modal.years.delete-year');
    }

    public function delete() {
        Inscription::where('id', 'like', '%%')->delete();
        $categories = Category::all();
        foreach ($categories as $category) {
            $category->status = 'n';
            $category->save();
        }
        $this->year->delete();
        $this->closeModal();
        $this->emit('refreshParent');
    }
}
