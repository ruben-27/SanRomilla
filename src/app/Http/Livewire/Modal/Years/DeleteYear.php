<?php

namespace App\Http\Livewire\Modal\Years;

use App\Models\Year;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;

class DeleteYear extends ModalComponent
{
    public $year;

    public function mount($year)
    {
        $this->year = Year::where('year', $year)->first();
    }

    public function render()
    {
        return view('livewire.modal.years.delete-year');
    }

    public function delete() {
        Year::where('active', 1)->delete();
        $this->closeModal();
        $this->emit('refreshParent');
    }
}
