<?php

namespace App\Http\Livewire\Modal\Donations;

use App\Models\Donation;
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
        $this->closeModal();
        $this->emit('refreshParent');
    }
}
