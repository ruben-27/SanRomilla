<?php

namespace App\Http\Livewire;

use App\Http\Controllers\YearController;
use App\Models\Category;
use App\Models\GeneralData;
use App\Models\Inscription;
use App\Models\Year;
use Livewire\Component;

class AddPublicInscription extends Component
{
    // Inputs
    public $inscripId = 1;
    public $name;
    public $last_name;
    public $email;
    public $dni;
    public $phone;
    public $birthday;
    public $gender = 'n';
    public $size;
    public $amount;
    public $categoryName;

    public $category;
    public $remember;
    public $donation = 0;
    public $emptyForm = true;

    // For all
    public $inscriptions = [];
    public $categories;
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
        'amount.max' => 'La donación es demasiado grande.'
    ];

    protected function rules()
    {
        return [
            'name' => ['required', 'min:2', 'max:80'],
            'last_name' => ['required', 'min:2', 'max:180'],
            'email' => ['required', 'email', 'max:180'],
            'dni' => [
                'required',
                function ($attribute, $value, $fail) {
                    $letra = substr($value, -1);
                    $numeros = substr($value, 0, -1);
                    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", ((int)$numeros) % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8)
                        return true;
                    $fail('Introduzca un DNI válido.');
                    return false;
                }
            ],
            'birthday' => ['required', 'date', 'before:tomorrow'],
            'gender' => [
                function ($attribute, $value, $fail) {
                    if ($value != "n")
                        return true;
                    $fail('Este campo es obligatorio.');
                    return false;
                }
            ],
            'amount' => [
                'required',
                'numeric',
                'max:999',
                function ($attribute, $value, $fail) {
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
        return view('livewire.add-public-inscription');
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
        $this->emptyForm = false;

        // Set category
        if ($this->birthday != null) {
            $birthdayYear = substr($this->birthday, 0, 4);
            foreach ($this->categories as $category) {
                if ($category->min_age == null && $birthdayYear >= ($this->currentYear->year - $category->max_age))
                    $this->category = $category;
                if ($category->max_age == null && $birthdayYear <= ($this->currentYear->year - $category->min_age))
                    $this->category = $category;
                if ($category->min_age != null && $category->max_age != null) {
                    if (($this->currentYear->year - $category->min_age) >= $birthdayYear && $birthdayYear >= ($this->currentYear->year - $category->max_age)) {
                        $this->category = $category;
                    }
                }
            }
        } else $this->categoryName = '';
        if ($this->category != null)
            $this->categoryName = $this->category->name;

        $this->donation = ($this->category == null ? 0 : $this->category->price) + ($this->size == 'n' || $this->size == null ? 0 : $this->shirt_price);
    }

    // Inscriptions

    public function otherInscription()
    {
        $this->validate();
        // Validate if already exists
        $exists = $this->validateIfExists($this->inscripId);
        // If not, store it
        if (!$exists)
            $this->addInscription();

        $this->resetActiveInputs();
        $this->emptyForm = true;

    }

    public function changeInscription($id)
    {
        if (!$this->emptyForm) {
            $this->validate();
            // Validate if already exists
            $exists = $this->validateIfExists($this->inscripId);
            // If not, store it
            if (!$exists)
                $this->addInscription();
        }
        $this->setActiveInputs($id);
    }

    public function deleteInscription($id)
    {
        foreach ($this->inscriptions as $key => $inscription) {
            if ($id == $inscription['inscripId'])
                \array_splice($this->inscriptions, $key, 1);
        }
        if (count($this->inscriptions) > $id - 1)
            for ($i = $id - 1; $i < count($this->inscriptions); $i++) {
                $this->inscriptions[$i]['inscripId'] = $this->inscriptions[$i]['inscripId'] - 1;
            }
    }

    public function validateIfExists($id)
    {
        foreach ($this->inscriptions as $key => $inscription)
            if ($inscription['inscripId'] == $id) {
                $this->inscriptions[$key] = $this->updateInscription();
                return true;
            }
        return false;
    }

    public function addInscription()
    {
        $this->inscriptions[] = [
            'inscripId' => $this->inscripId,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'dni' => $this->dni,
            'phone' => $this->phone,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'size' => $this->size,
            'amount' => $this->amount,
            'categoryName' => $this->categoryName,
            'category' => $this->category,
            'donation' => $this->donation
        ];
    }

    public function updateInscription()
    {
        return [
            'inscripId' => $this->inscripId,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'dni' => $this->dni,
            'phone' => $this->phone,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'size' => $this->size,
            'amount' => $this->amount,
            'categoryName' => $this->categoryName,
            'category' => $this->category,
            'donation' => $this->donation
        ];
    }

    public function setActiveInputs($id)
    {
        foreach ($this->inscriptions as $inscript)
            if ($inscript['inscripId'] == $id) {
                $inscription = $inscript;
            }
        $this->inscripId = $inscription['inscripId'];
        $this->name = $inscription['name'];
        $this->last_name = $inscription['last_name'];
        $this->email = $inscription['email'];
        $this->dni = $inscription['dni'];
        $this->phone = $inscription['phone'];
        $this->birthday = $inscription['birthday'];
        $this->gender = $inscription['gender'];
        $this->size = $inscription['size'];
        $this->amount = $inscription['amount'];
        $this->categoryName = $inscription['categoryName'];
        $this->category = $inscription['category'];
        $this->donation = $inscription['donation'];
    }

    public function resetActiveInputs()
    {
        // Restore active inputs
        $this->inscripId = count($this->inscriptions) + 1;
        $this->name = '';
        $this->last_name = '';
        $this->email = '';
        $this->dni = '';
        $this->phone = '';
        $this->birthday = '';
        $this->gender = 'n';
        $this->size = '';
        $this->amount = '';
        $this->categoryName = '';
        $this->category = '';
        $this->donation = 0;
    }

    public function submit()
    {
        $this->validate();
        $exists = $this->validateIfExists($this->inscripId);
        if (!$exists)
            $this->addInscription();

        $inscriptionNumber = $this->generateUniqueCode();
        // Save inscription
        if ($this->inscriptions <= 0) {
            $this->saveInscription($inscriptionNumber);
        } else {
            foreach ($this->inscriptions as $inscrip) {
                $inscription = new Inscription();
                $inscription->name = $inscrip['name'];
                $inscription->last_name = $inscrip['last_name'];
                $inscription->dni = $inscrip['dni'];
                $inscription->email = $inscrip['email'];
                $inscription->birthday = $inscrip['birthday'];
                $inscription->gender = $inscrip['gender'];
                $inscription->phone = $inscrip['phone'];
                $inscription->amount = $inscrip['amount'];
                $inscription->size = $inscrip['size'];
                $inscription->category_id = $inscrip['category']['id'];
                $inscription->dorsal = null;
                $inscription->paid = 0;
                $inscription->inscription_number = $inscriptionNumber;
                $inscription->save();
            }
        }

        // Update year amount raised
        $year = Year::where('active', 1)->first();
        $year->amount_raised += $this->amount;
        $year->save();

        $this->redirect(route('inscription'));
        return true;
    }

    public function saveInscription($inscriptionNumber)
    {
        $inscription = new Inscription();
        $inscription->name = $this->name;
        $inscription->last_name = $this->last_name;
        $inscription->dni = $this->dni;
        $inscription->email = $this->email;
        $inscription->birthday = $this->birthday;
        $inscription->gender = $this->gender;
        $inscription->phone = $this->phone;
        $inscription->amount = $this->amount;
        $inscription->size = $this->size;
        $inscription->category_id = $this->category->id;
        $inscription->dorsal = null;
        $inscription->paid = 0;
        $inscription->inscription_number = $inscriptionNumber;
        $inscription->save();
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Inscription::where("inscription_number", "=", $code)->first());

        return $code;
    }
}
