<?php

namespace App\Http\Livewire;

use App\Models\Inscription;
use App\Models\Year;
use Livewire\Component;
use App\Models\Category;
use App\Models\Mark;


class CategoryFill extends Component
{
    public $categoryId;
    public $category;
    public $marks;
    public $place;
    public $buttonView;
    public $markArray = array();

    public $dorsals = [];
    public $currentYear;

    protected function rules()
    {
        $array = [];
        foreach ($this->marks as $i => $mark)
            $array['dorsals.' . $i] = [
                'required',
                'digits_between:1,4',
                function($attribute, $value, $fail) {
                    $count = Inscription::all()->where('dorsal', $value)->count();
                    if ($count > 0)
                        return true;
                    $fail('El dorsal no existe');
                    return false;
                },
                function($attribute, $value, $fail) {
                    $count = Mark::all()->where('dorsal', $value)->count();
                    if ($count == 0)
                        return true;
                    $fail('El dorsal está en uso');
                    return false;
                },
                function($attribute, $value, $fail) {
                    $inscription = Inscription::where('dorsal', $value)->first();
                    if ($inscription && $inscription->category_id == $this->categoryId)
                        return true;
                    $fail('El dorsal pertenece a otra categoría');
                    return false;
                },
                function($attribute, $value, $fail) {
                    $count = 0;
                    foreach ($this->dorsals as $i => $dorsal){
                        if ($attribute != 'dorsals.' . $i && $value == $dorsal) {
                            $count++;
                        }
                    }
                    if ($count == 0)
                        return true;
                    $fail('No se puede poner dos dorsales iguales');
                    return false;
                }
            ];
        return $array;
    }

    protected function messages()
    {
        $array = [];
        foreach ($this->marks as $i => $mark) {
            $array['dorsals.' . $i . '.required'] = 'Debe introducir un dorsal.';
            $array['dorsals.' . $i . '.unique'] = 'El dorsal que ha introducido ya está en uso.';
            $array['dorsals.' . $i . '.digits_between'] = 'Debe introducir un número de 1 a 4 carácteres.';
        }
        return $array;
    }

    public function render()
    {
        $this->currentYear = Year::where('active', 1)->first();
        $this->category = Category::where('id',$this->categoryId)->first();
        $this->marks = Mark::where('category_id',$this->categoryId)
            ->where('year_id', $this->currentYear->id)
            ->orWhere('year_id', null)
            ->get();
        $this->place = count($this->marks);
        $this->buttonView = $this->category->status;
        return view('livewire.category-fill');
    }

    public function mount($id)
    {
        $this->categoryId = $id;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit() {
        $this->validate();
        foreach ($this->marks as $i => $mark){
            $inscription = Inscription::where('dorsal', $this->dorsals[$i])->first();
            $mark->name = $inscription->name;
            $mark->last_name = $inscription->last_name;
            $mark->dorsal = $this->dorsals[$i];
            $mark->gender = $inscription->gender;
            $mark->year_id = $this->currentYear->id;
            $mark->save();
        }
        return view('private.mark.mark');
    }
}
