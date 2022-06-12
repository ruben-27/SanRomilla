<?php

namespace App\Http\Livewire\Modal\Categories;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;

class DeleteCategory extends ModalComponent
{
    public $category;

    public function mount($category)
    {
        $this->category = Category::find($category);
    }

    public function render()
    {
        return view('livewire.modal.categories.delete-category');
    }

    public function delete() {
        $this->category->delete();
        $this->closeModal();
        $this->emit('refreshParent');
    }
}
