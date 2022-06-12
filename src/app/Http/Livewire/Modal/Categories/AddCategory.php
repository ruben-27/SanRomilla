<?php

namespace App\Http\Livewire\Modal\Categories;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;

class AddCategory extends ModalComponent
{
    // Inputs
    public $categoryId;
    public $name;
    public $min_age;
    public $max_age;
    public $distance;
    public $start_time;
    public $price;

    public $category;
    protected $rules = [
        'name' => ['required', 'min:2', 'max:50'],
        'min_age' => ['digits_between:0,2'],
        'max_age' => ['digits_between:0,2', 'gt:min_age'],
        'distance' => ['required', 'numeric', 'max:9999'],
        'start_time' => ['required'],
        'price' => ['required', 'numeric', 'max:99']
    ];
    protected $messages = [
        'name.required' => 'El campo nombre es obligatorio.',
        'name.min' => 'Debe introducir al menos 2 carácteres.',
        'name.max' => 'El nombre es demasiado largo.',
        'min_age.digits_between' => 'Debe introducir una edad válida.',
        'max_age.digits_between' => 'Debe introducir una edad válida.',
        'max_age.gt' => 'La edad máxima debe ser mayor.',
        'distance.required' => 'El campo distancia es obligatorio.',
        'distance.numeric' => 'Debe introducir un número.',
        'distance.max' => 'Debe introducir una distancia válida.',
        'start_time.required' => 'El campo Hora inicio es obligatorio.',
        'price.required' => 'El campo precio es obligatorio.',
        'price.numeric' => 'Debe introducir un número.',
        'price.max' => 'El precio es demasiado alto.',
    ];

    public function mount($category = null)
    {
        if ($category != null) {
            $this->category = Category::find($category);
            $this->categoryId = $this->category->id;
            $this->name = $this->category->name;
            $this->min_age = $this->category->min_age;
            $this->max_age = $this->category->max_age;
            $this->distance = $this->category->distance;
            $this->start_time = $this->category->start_time;
            $this->price = $this->category->price;
        }
    }

    public function render()
    {
        return view('livewire.modal.categories.add-category');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit() {
        $this->validate();
        if (!$this->category)
            $this->category = new Category();
        $this->category->name = $this->name;
        $this->category->min_age = $this->min_age != '' ? $this->min_age : null;
        $this->category->max_age = $this->max_age != '' ? $this->max_age : null;
        $this->category->distance = $this->distance;
        $this->category->start_time = $this->start_time;
        $this->category->price = $this->price;
        $this->category->save();
        $this->closeModal();
        $this->emit('refreshParent');
    }
}
