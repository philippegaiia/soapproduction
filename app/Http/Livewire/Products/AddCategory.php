<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;

class AddCategory extends Component
{
    public $subcategories;
    public $categories;
    public $product;

    public $selectedSubcategory = NULL;
    public $selectedCategory = NULL;

    public function mount($selectedSubcategory = null)
    {
        $this->categories = ProductCategory::all();
        $this->subcategories = collect();
        $this->selectedSubcategory = $selectedSubcategory;

        if (!is_null($selectedSubcategory)) {
            $subcategory = ProductSubcategory::with('productCategory')->find($selectedSubcategory);
            if($subcategory){
                $this->subcategories = ProductSubcategory::where('product_category_id', $subcategory->product_category_id)->get();
                $this->selectedCategory = $subcategory->product_category_id;
            }
        }
    }

    public function render()
    {
        return view('livewire.products.add-category');
    }

    public function updatedSelectedCategory($category)
    {
        if(!is_null($category)){
         $this->subcategories = ProductSubcategory::where('product_category_id', $category)->get();
        }
    }
}



