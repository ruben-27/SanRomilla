<?php

namespace App\Http\Livewire\Modal\Sponsors;

use App\Models\Sponsor;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class AddSponsor extends ModalComponent
{
    use WithFileUploads;
    // Inputs
    public $sponsorId;
    public $name;
    public $image;
    public $url;

    public $sponsor;
    protected $messages = [
        'name.required' => 'El campo nombre es obligatorio.',
        'name.min' => 'Debe introducir al menos 2 carácteres.',
        'name.max' => 'El nombre es demasiado largo.',
        'image.required' => 'El campo logo es obligatorio.',
        'image.image' => 'Ajústese al formato imagen.',
        'image.mimes' => 'Ajústese al formato imagen. (jpeg,png,jpg,gif,svg)',
        'image.max' => 'El tamaño de la imagen es demasiado grande.',
        'url.required' => 'El campo url es obligatorio.',
        'url.max' => 'La ulr es demasiado larga.'
    ];

    protected function rules() {
        if ($this->sponsor)
            return [
                'name' => ['required', 'min:2', 'max:80'],
                'url' => ['required', 'max:190']
            ];
        return [
            'name' => ['required', 'min:2', 'max:80'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'url' => ['required', 'max:190']
        ];
    }

    public function render()
    {
        return view('livewire.modal.sponsors.add-sponsor');
    }

    public function mount($sponsor = null)
    {
        if ($sponsor != null) {
            $this->sponsor = Sponsor::find($sponsor);
            $this->sponsorId = $this->sponsor->id;
            $this->name = $this->sponsor->name;
            $this->url = $this->sponsor->url;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit() {
        $this->validate();

        // Save sponsor
        if (!$this->sponsor)
            $this->sponsor = new Sponsor();
        $this->sponsor->name = $this->name;
        $this->sponsor->url = $this->url;
        if ($this->image) {
            if (File::exists(public_path('storage/' . $this->sponsor->image)))
                File::delete(public_path('storage/' . $this->sponsor->image));
            $image = $this->image->store('images/sponsors', 'public');
            $this->sponsor->image = $image;
        }

        $this->sponsor->save();

        $this->closeModal();
        $this->emit('refreshParent');
    }
}
