<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;

class Subcategories extends Component
{
    public $showModal = false;
    public $categoryId;
    public $category;
    public $mainCategories;

    protected $rules = [
        'category.product_category_id' => 'required',
        'category.code' => 'max:10',
        'category.name' => 'required',
        'category.hs_code' => 'required|max:20',
        'category.active' => 'required',
    ];

    public function mount()
    {
        $this->mainCategories = ProductCategory::all();
    }

    public function render()
    {
        return view('livewire.products.subcategories', [
            'categories' => ProductSubcategory::all(),
            // 'mainCategories' => ProductCategory::all()
        ]);
    }

    public function edit($categoryId)
    {
        $this->showModal = true;
        $this->categoryId = $categoryId;
        $this->category = ProductSubcategory::find($categoryId);
    }

    public function create()
    {
        $this->showModal = true;
        $this->category = null;
        $this->categoryId = null;
    }

    public function save()
    {
        // dd($this->category);

        $this->validate();

        if (!is_null($this->categoryId)) {
            $this->category->save();
        } else {
            ProductSubcategory::create($this->category);
        }
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($categoryId)
    {
        $category = ProductSubcategory::find($categoryId);
        if ($category) {
            $category->delete();
        }
    }

}
