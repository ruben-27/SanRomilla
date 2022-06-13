<?php

namespace App\Http\Livewire\Modal\Years;

use App\Models\GeneralData;
use App\Models\Year;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AddYear extends ModalComponent
{
    // Inputs
    public $yearId;
    public $year;
    public $ong;
    public $ong_message;
    public $max_people;
    public $start_datetime;
    public $start_date_inscription;
    public $end_date_inscription;

    public $currentYear;
    public $generalData;
    public $shirt_price;
    public $shirt_benefit;
    protected $messages = [
        '*.required' => 'Este campo es obligatorio.',
        '*.numeric' => 'Ajústese al formato del campo.',
        '*.date' => 'Ajústese al formato del campo.',
        'year.min' => 'Año demasiado pequeño.',
        'year.max' => 'Año demasiado grande.',
        'year.unique' => 'Este año ya está registrado.',
        'ong.min' => 'Nombre demasiado corto.',
        'ong.max' => 'Nombre demasiado largo.',
        'ong_message.min' => 'Texto demasiado corto.',
        'ong_message.max' => 'Texto demasiado largo.',
        'end_date_inscription.after' => 'La fecha fin debe ser posterior de la fecha inicio.',
    ];

    protected function rules() {
        if ($this->currentYear)
            return [
                'year' => ['required', 'numeric', 'min:2000', 'max:3000', 'unique:years,year, ' . $this->currentYear->id],
                'ong' => ['required', 'min:2', 'max:80'],
                'ong_message' => ['required', 'min:5', 'max:900'],
                'max_people' => ['required', 'numeric', 'min:100', 'max:5000'],
                'start_datetime' => ['required', 'date'],
                'start_date_inscription' => ['required', 'date'],
                'end_date_inscription' => ['required', 'date', 'after:start_date_inscription'],
            ];
        return [
            'year' => ['required', 'numeric', 'min:2000', 'max:3000', 'unique:years'],
            'ong' => ['required', 'min:2', 'max:80'],
            'ong_message' => ['required', 'min:5', 'max:900'],
            'max_people' => ['required', 'numeric', 'min:100', 'max:5000'],
            'start_datetime' => ['required', 'date'],
            'start_date_inscription' => ['required', 'date'],
            'end_date_inscription' => ['required', 'date', 'after:start_date_inscription'],
        ];
    }

    public function render()
    {
        return view('livewire.modal.years.add-year');
    }

    public function mount($year = null)
    {
        $this->generalData = GeneralData::first();
        $this->shirt_price = $this->generalData->shirt_price;
        $this->shirt_benefit = $this->generalData->shirt_benefit;
        if ($year != null) {
            $this->currentYear = Year::find($year);
            $this->yearId = $this->currentYear->id;
            $this->year = $this->currentYear->year;
            $this->ong = $this->currentYear->ong;
            $this->ong_message = $this->currentYear->ong_message;
            $this->max_people = $this->generalData->max_people;
            $this->start_datetime = $this->generalData->start_datetime;
            $this->start_date_inscription = $this->generalData->start_date_inscription;
            $this->end_date_inscription = $this->generalData->end_date_inscription;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit() {
        $this->validate();
        // Save Year
        if (!$this->currentYear) {
            $this->currentYear = new Year();
            $this->currentYear->amount_raised = 0;
            $this->currentYear->active = 1;
        }
        $this->currentYear->year = $this->year;
        $this->currentYear->ong = $this->ong;
        $this->currentYear->ong_message = $this->ong_message;
        $this->currentYear->save();

        // Save General Data
        DB::update(
            'UPDATE general_data
                    SET max_people = ?,
                        start_datetime = ?,
                        start_date_inscription = ?,
                        end_date_inscription = ?',
            [
                $this->max_people,
                $this->start_datetime,
                $this->start_date_inscription,
                $this->end_date_inscription
            ]
        );

        $this->closeModal();
        $this->emit('refreshParent');
    }
}
