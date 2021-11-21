<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ingredient;
use App\Models\IngredientCategory;

class CategoryIngredient extends Component
{
    public $categories;
    public $ingredients;
    public $listing;

    public $selectedCategory = NULL;
    public $selectedIngredient = NULL;

    public function mount($selectedIngredient = null)
    {
        $this->categories = IngredientCategory::all();
        $this->ingredients = collect();
        $this->selectedIngredient = $selectedIngredient;

        if (!is_null($selectedIngredient)) {
            $ingredient = Ingredient::with('ingredientCategory')->find($selectedIngredient);
            if($ingredient){
                $this->ingredients = Ingredient::where('ingredient_category_id', $ingredient->ingredient_category_id)->get();
                $this->selectedCategory = $ingredient->ingredient_category_id;
            }
        }
    }

    public function render()
    {
        return view('livewire.category-ingredient');
    }

    public function updatedSelectedCategory($category)
    {
        if(!is_null($category)){
         $this->ingredients = Ingredient::where('ingredient_category_id', $category)->get();
        }
    }
}
