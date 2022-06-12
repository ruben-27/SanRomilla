<?php

namespace App\Http\Livewire\Modal\Colaborators;

use App\Models\Role;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class AddColaborator extends ModalComponent
{
    // Inputs
    public $colaboratorId;
    public $name;
    public $last_name;
    public $email;
    public $roles;

    public $colaborator;
    public $allRoles;
    protected $messages = [
        'name.required' => 'El campo nombre es obligatorio.',
        'name.min' => 'Debe introducir al menos 2 carácteres.',
        'name.max' => 'El nombre es demasiado largo.',
        'last_name.required' => 'El campo apellidos es obligatorio.',
        'last_name.min' => 'Debe introducir al menos 2 carácteres.',
        'last_name.max' => 'Los apellidos son demasiado largos.',
        'email.required' => 'El campo email es obligatorio.',
        'email.email' => 'Debe introducir un correo válido.',
        'email.unique' => 'El correo que ha introducido ya está en uso.'
    ];

    protected function rules() {
        return [
            'name' => ['required', 'min:2', 'max:80'],
            'last_name' => ['required', 'min:2', 'max:180'],
            'email' => ['required', 'email', 'unique:users,email, ' . $this->colaborator->id]
        ];
    }

    public function mount($colaborator = null)
    {
        if ($colaborator != null) {
            $this->colaborator = User::find($colaborator);
            $this->colaboratorId = $this->colaborator->id;
            $this->name = $this->colaborator->name;
            $this->last_name = $this->colaborator->last_name;
            $this->email = $this->colaborator->email;
        }
        $this->allRoles = Role::all();
    }

    public function render()
    {
        return view('livewire.modal.colaborators.add-colaborator');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit() {
        if (!$this->colaborator)
            $this->colaborator = new User();
        $this->colaborator->name = $this->name;
        $this->colaborator->last_name = $this->last_name;
        $this->colaborator->email = $this->email;
        $this->colaborator->save();
        $this->closeModal();
        $this->emit('refreshParent');
    }
}
