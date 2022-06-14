<?php

namespace App\Http\Livewire;

use App\Http\Controllers\YearController;
use App\Models\Category;
use App\Models\GeneralData;
use App\Models\Year;
use Livewire\Component;

class AddInscription extends Component
{
    // Inputs
    public $name;
    public $last_name;
    public $email;
    public $dni;
    public $phone;
    public $birthday;
    public $gender = 'n';
    public $dorsal;
    public $size;
    public $amount;
    public $categoryName;
    public $remember;

    public $category;
    public $categories;
    public $donation = 0;
    public $currentYear;
    public $shirt_price;
    public $shirt_benefit;
    protected $messages = [
        'remember.required' => 'Debe aceptar los téminos de uso',
        '*.required' => 'Este campo es obligatorio.',
        'name.min' => 'Debe introducir al menos 2 carácteres.',
        'name.max' => 'El nombre es demasiado largo.',
        'last_name.min' => 'Debe introducir al menos 2 carácteres.',
        'last_name.max' => 'Los apellidos son demasiado largos.',
        'email.email' => 'Ajústese al formato de correo.',
        'email.max' => 'El correo es demasiado largo.',
        'birthday.date' => 'Introduzca una fecha válida.',
        'birthday.before' => 'Introduzca una fecha válida.',
        'birthday.before' => 'Introduzca una fecha válida.',
        'dorsal.unique' => 'El dorsal ya está en uso.',
        'dorsal.max' => 'Debe introducir un número de 1 a 4 carácteres.',
        'amount.max' => 'La donación es demasiado grande.'
    ];

    protected function rules() {
        return [
            'name' => ['required', 'min:2', 'max:80'],
            'last_name' => ['required', 'min:2', 'max:180'],
            'email' => ['required', 'email', 'max:180'],
            'dni' => [
                'required',
                function($attribute, $value, $fail) {
                    $letra = substr($value, -1);
                    $numeros = substr($value, 0, -1);
                    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 )
                        return true;
                    $fail('Introduzca un DNI válido.');
                    return false;
                }
            ],
            'birthday' => ['required', 'date', 'before:tomorrow'],
            'gender' => [
                function($attribute, $value, $fail) {
                    if ($value != "n")
                        return true;
                    $fail('Este campo es obligatorio.');
                    return false;
                }
            ],
            'dorsal' => ['unique:inscriptions', 'max:4'],
            'amount' => [
                'required',
                'numeric',
                'max:999',
                function($attribute, $value, $fail) {
                    if ($value >= $this->donation)
                        return true;
                    $fail('La donación mínima es ' . $this->donation . '€');
                    return false;
                }
            ],
            'remember' => ['required']
        ];
    }

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.add-inscription');
    }

    public function mount()
    {
        $this->currentYear = YearController::getActiveYear();
        $shirt = GeneralData::first();
        $this->shirt_price = $shirt->shirt_price;
        $this->shirt_benefit = $shirt->shirt_benefit;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        // Set category
        if ($this->birthday != null) {
            $birthdayYear = substr($this->birthday, 0, 4);
            foreach ($this->categories as $category) {
                if($category->min_age == null && $birthdayYear >= ($this->currentYear->year - $category->max_age))
                    $this->category = $category;
                if($category->max_age == null && $birthdayYear <=($this->currentYear->year - $category->min_age))
                    $this->category = $category;
                if ($category->min_age != null && $category->max_age != null) {
                    if (($this->currentYear->year - $category->min_age) >= $birthdayYear && $birthdayYear >= ($this->currentYear->year - $category->max_age)) {
                        $this->category = $category;
                    }
                }
            }
        } else $this->categoryName = '';
        if($this->category != null)
            $this->categoryName = $this->category->name;

        $this->donation = ($this->category == null ? 0 : $this->category->price) + ($this->size == 'n' || $this->size == null ? 0 : $this->shirt_price);
    }

    public function submit() {
        $this->validate();
    }
}
