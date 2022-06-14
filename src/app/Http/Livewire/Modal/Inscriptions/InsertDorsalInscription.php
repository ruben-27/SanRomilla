<?php

namespace App\Http\Livewire\Modal\Inscriptions;

use App\Models\Inscription;
use LivewireUI\Modal\ModalComponent;

class InsertDorsalInscription extends ModalComponent
{
    public $inscription;

    public $dorsal;
    protected $rules = [
        'dorsal' => ['required', 'unique:inscriptions', 'digits_between:1,4']
    ];
    protected $messages = [
        'dorsal.required' => 'Debe introducir un dorsal.',
        'dorsal.unique' => 'El dorsal que ha introducido ya está en uso.',
        'dorsal.digits_between' => 'Debe introducir un número de 1 a 4 carácteres.'
    ];

    public function mount($inscription)
    {
        $this->inscription = Inscription::find($inscription);
    }

    public function render()
    {
        return view('livewire.modal.inscriptions.insert-dorsal-inscription');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit() {
        $this->validate();
        $this->inscription->dorsal = $this->validate()['dorsal'];
        $this->inscription->paid = 1;
        $this->inscription->save();
        $this->emit('refreshParent');
        $this->forceClose()->closeModal();
    }

    public function close() {
        $this->forceClose()->closeModal();
    }
}
