<?php

namespace App\Http\Livewire\Ingredient;

use Livewire\Component;
use Livewire\WithFileUploads;

class AddDocuments extends Component
{
    use WithFileUploads;

    public $documentations;
    public $ingredients;


    public function render()
    {
        return view('livewire.ingredient.add-documents');
    }
}
