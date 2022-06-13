<?php

namespace App\Http\Livewire\Modal\Sponsors;

use App\Models\Sponsor;
use Illuminate\Support\Facades\File;
use LivewireUI\Modal\ModalComponent;

class DeleteSponsor extends ModalComponent
{
    public $sponsor;

    public function mount($sponsor)
    {
        $this->sponsor = Sponsor::find($sponsor);
    }

    public function render()
    {
        return view('livewire.modal.sponsors.delete-sponsor');
    }

    public function delete() {
        if (File::exists(public_path('storage/' . $this->sponsor->image)))
            File::delete(public_path('storage/' . $this->sponsor->image));
        $this->sponsor->delete();
        $this->closeModal();
        $this->emit('refreshParent');
    }
}
