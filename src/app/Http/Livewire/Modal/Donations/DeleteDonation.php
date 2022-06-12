<?php

namespace App\Http\Livewire\Modal\Donations;

use App\Models\Donation;
use App\Models\GeneralData;
use App\Models\Year;
use LivewireUI\Modal\ModalComponent;

class DeleteDonation extends ModalComponent
{
    public $donation;

    public function mount($donation)
    {
        $this->donation = Donation::find($donation);
    }

    public function render()
    {
        return view('livewire.modal.donations.delete-donation');
    }

    public function delete() {
        $this->donation->delete();

        // Update year amount raised
        $general_data = GeneralData::first();
        $year = Year::where('active', 1)->first();
        if ($this->donation->size != null)
            $year->amount_raised -= ($this->donation->amount + $general_data->shirt_benefit) - $general_data->shirt_price;
        else
            $year->amount_raised -= $this->donation->amount;
        $year->save();

        $this->closeModal();
        $this->emit('refreshParent');
    }
}
