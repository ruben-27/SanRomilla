<?php

namespace App\Http\Livewire\Modal\Donations;

use App\Models\Donation;
use App\Models\GeneralData;
use App\Models\Year;
use LivewireUI\Modal\ModalComponent;

class AddDonation extends ModalComponent
{
    // Inputs
    public $name;
    public $last_name;
    public $amount;
    public $size = 'n';

    public $shirt_price;
    public $shirt_benefit;
    protected $rules = [
        'name' => ['required', 'min:2', 'max:80'],
        'last_name' => ['required', 'min:2', 'max:180'],
        'amount' => ['required', 'numeric', 'max:999']
    ];
    protected $messages = [
        'name.required' => 'El campo nombre es obligatorio.',
        'name.min' => 'Debe introducir al menos 2 carácteres.',
        'name.max' => 'El nombre es demasiado largo.',
        'last_name.required' => 'El campo apellidos es obligatorio.',
        'last_name.min' => 'Debe introducir al menos 2 carácteres.',
        'last_name.max' => 'Los apellidos son demasiado largos.',
        'amount.required' => 'El campo donación es obligatorio.',
        'amount.numeric' => 'Debe introducir una donación válida.',
        'amount.max' => 'La donación es demasiado grande.'
    ];

    public function render()
    {
        return view('livewire.modal.donations.add-donation');
    }

    public function mount()
    {
        $shirt = GeneralData::first();
        $this->shirt_price = $shirt->shirt_price;
        $this->shirt_benefit = $shirt->shirt_benefit;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit() {
        $this->validate();
        // Save donation
        $donation = new Donation();
        $donation->name = $this->name;
        $donation->last_name = $this->last_name;
        if ($this->size == 'n') {
            $donation->amount = $this->amount;
            $donation->size = null;
        }else {
            $donation->amount = $this->amount + $this->shirt_price;
            $donation->size = $this->size;
        }
        $donation->save();

        // Update year amount raised
        $year = Year::where('active', 1)->first();
        if ($this->size == 'n')
            $year->amount_raised += $this->amount;
        else
            $year->amount_raised += $this->amount + $this->shirt_benefit;
        $year->save();

        $this->closeModal();
        $this->emit('refreshParent');
    }
}
