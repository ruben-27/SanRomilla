<?php

namespace App\Http\Livewire\Modal\Sponsors;

use App\Models\Sponsor;
use LivewireUI\Modal\ModalComponent;

class DeleteSponsor extends ModalComponent
{
    public $sponsor;

    public function mount($sponsor)
    {
        $this->sponsor = Sponsor::find($sponsor);
    }

    public function render()
    {
        return view('livewire.modal.sponsors.delete-sponsor');
    }

    public function delete() {
        $this->sponsor->delete();
        $this->closeModal();
        $this->emit('refreshParent');
    }
}
