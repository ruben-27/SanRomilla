<?php

namespace App\Http\Livewire\Modal\Inscriptions;

use App\Models\Inscription;
use LivewireUI\Modal\ModalComponent;

class DeleteInscription extends ModalComponent
{
    public $inscriptionId;
    public $inscription;

    public function mount($inscriptionId)
    {
        // Gate::authorize('update', $id);

        $this->inscriptionId = $inscriptionId;
        $this->inscription = Inscription::find($inscriptionId);
    }

    public function render()
    {
        return view('livewire.modal.inscriptions.delete-inscription');
    }

    public function delete() {
        Inscription::find($this->inscriptionId)->delete();
        $this->closeModal();
        $this->emit('refreshParent');
    }
}
