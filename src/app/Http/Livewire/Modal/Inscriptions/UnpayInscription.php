<?php

namespace App\Http\Livewire\Modal\Inscriptions;

use App\Models\Inscription;
use LivewireUI\Modal\ModalComponent;

class UnpayInscription extends ModalComponent
{
    public $inscription;

    protected $listeners = [
        'refreshParent'
    ];

    public function mount($inscription)
    {
        $this->inscription = Inscription::find($inscription);
    }

    public function render()
    {
        return view('livewire.modal.inscriptions.unpay-inscription');
    }

    public function refreshParent() {
        $this->emit('refreshParent');
    }
}
