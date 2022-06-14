<?php

namespace App\Http\Livewire\Modal\Inscriptions;

use App\Models\Inscription;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class InsertDorsalInscriptions extends ModalComponent
{
    public $inscriptions;

    public $dorsals = [];

    protected function rules()
    {
        $array = [];
        foreach ($this->inscriptions as $i => $insc)
            $array['dorsals.' . $i] = [
                'required',
                'digits_between:1,4',
                function($attribute, $value, $fail) {
                    $count = Inscription::all()->where('dorsal', $value)->count();
                    if ($count == 0)
                        return true;
                    $fail('El dorsal está en uso');
                    return false;
                },
                function($attribute, $value, $fail) {
                    $count = 0;
                    foreach ($this->dorsals as $i => $dorsal){
                        if ($attribute != 'dorsals.' . $i && $value == $dorsal) {
                            $count++;
                        }
                    }
                    if ($count == 0)
                        return true;
                    $fail('No se puede poner dos dorsales iguales');
                    return false;
                }
            ];
        return $array;
    }

    protected function messages()
    {
        $array = [];
        foreach ($this->inscriptions as $i => $insc) {
            $array['dorsals.' . $i . '.required'] = 'Debe introducir un dorsal.';
            $array['dorsals.' . $i . '.unique'] = 'El dorsal que ha introducido ya está en uso.';
            $array['dorsals.' . $i . '.digits_between'] = 'Debe introducir un número de 1 a 4 carácteres.';
        }
        return $array;
    }

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
        $this->validate();
        foreach ($this->inscriptions as $i => $inscription){
            $inscription->dorsal = $this->dorsals[$i];
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
