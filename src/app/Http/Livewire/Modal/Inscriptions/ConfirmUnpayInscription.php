<?php

namespace App\Http\Livewire\Modal\Inscriptions;

use App\Models\Inscription;
use LivewireUI\Modal\ModalComponent;

class ConfirmUnpayInscription extends ModalComponent
{
    public $inscription;
    public $all;

    public function mount($inscription, $all)
    {
        $this->inscription = Inscription::find($inscription);
        $this->all = $all;
    }

    public function render()
    {
        return view('livewire.modal.inscriptions.confirm-unpay-inscription');
    }

    public function unpay() {
        if($this->all){
            $inscriptions = Inscription::all()
                ->where('inscription_number', $this->inscription->inscription_number);
            foreach ($inscriptions as $inscription){
                $inscription->dorsal = null;
                $inscription->paid = 0;
                $inscription->save();
            }
        } else {
            $this->inscription->dorsal = null;
            $this->inscription->paid = 0;
            $this->inscription->save();
        }
        $this->emit('refreshParent');
        $this->forceClose()->closeModal();
    }

    public function close() {
        $this->forceClose()->closeModal();
    }
}
