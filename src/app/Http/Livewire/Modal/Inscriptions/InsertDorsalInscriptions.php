<?php

namespace App\Http\Livewire\Modal\Inscriptions;

use App\Models\Inscription;
use LivewireUI\Modal\ModalComponent;

class InsertDorsalInscriptions extends ModalComponent
{
    public $inscriptions;

    public $dorsal = [];

    protected function rules()
    {
        $array = [];
        foreach ($this->inscriptions as $insc)
            $array['dorsal.' . $insc->id] = ['required', 'digits_between:1,4'];
        return $array;
    }

//    protected function rules()
//    {
//        $array = [];
//        foreach ($this->inscriptions as $insc)
//            $array['dorsal.' . $insc->id] = ['required', 'unique:inscriptions', 'digits_between:1,4'];
//        return $array;
//    }
//
//    protected function messages()
//    {
//        $array = [];
//        foreach ($this->inscriptions as $insc) {
//            $array['dorsal.' . $insc->id . '.required'] = 'Debe introducir un dorsal.';
//            $array['dorsal.' . $insc->id . '.unique'] = 'El dorsal que ha introducido ya está en uso.';
//            $array['dorsal.' . $insc->id . '.digits_between'] = 'Debe introducir un número de 1 a 4 carácteres.';
//        }
//        return $array;
//    }

    public function mount($inscription_number)
    {
        $this->inscriptions = Inscription::all()
            ->where('inscription_number', $inscription_number)
            ->where('paid', 0);
    }

    public function render()
    {
        return view('livewire.modal.inscriptions.insert-dorsal-inscriptions');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit() {
        foreach ($this->inscriptions as $inscription){
            $inscription->dorsal = $this->validate()['dorsal'][$inscription->id];
            $inscription->paid = 1;
            $inscription->save();
        }
        $this->emit('refreshParent');
        $this->forceClose()->closeModal();
    }

    public function close() {
        $this->forceClose()->closeModal();
    }
}