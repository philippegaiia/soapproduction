<?php

namespace App\Http\Livewire\Ingredients;

use Livewire\Component;
use App\Models\Ingredient;
use App\Models\IngredientCategory;
use Livewire\withPagination;

class Table extends Component
{
    use withPagination;

    public $categories;
    public $searchCategory;
    public $search;
    public $perPage;
    public $sortField;
    public $sortAsc;

    public function mount(){
        $this->categories = IngredientCategory::all();
        $this->search = '';
        $this->searchCategory;
        $this->perPage = 25;
        $this->sortField = 'name';
        $this->sortAsc = true;
    }

    public function render()
    {
        $ingredients = Ingredient::with('ingredientCategory')
            ->when($this->search != '', function($query){
                $query->where('name', 'like', '%'.$this->search.'%')->orWhere('inci', 'like', '%'.$this->search.'%');
            })
            ->when($this->searchCategory != '', function($query){
                $query->where('ingredient_category_id', 'like', '%'.$this->searchCategory.'%');
            })
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.ingredients.table', [
            'ingredients' => $ingredients
        ]);
    }
}
