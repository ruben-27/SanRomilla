<?php

namespace App\Http\Livewire\Modal\Colaborators;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class DeleteColaborator extends ModalComponent
{
    public $colaborator;

    public function mount($colaborator)
    {
       $this->colaborator = User::find($colaborator);
    }

    public function render()
    {
        return view('livewire.modal.colaborators.delete-colaborator');
    }

    public function delete() {
        $this->colaborator->delete();
        $this->closeModal();
        $this->emit('refreshParent');
    }
}
