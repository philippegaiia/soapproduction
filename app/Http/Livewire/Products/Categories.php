<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\ProductCategory;

class Categories extends Component
{
    public $showModal = false;
    public $categoryId;
    public $category;

    protected $rules = [
        'category.code' => 'max:10',
        'category.name' => 'required',
        'category.active' => 'required',
    ];

    public function render()
    {
        return view('livewire.products.categories', [
            'categories' => ProductCategory::orderBy('name')->get()
        ]);
    }

    public function edit($categoryId)
    {
        $this->showModal = true;
        $this->categoryId = $categoryId;
        $this->category = ProductCategory::find($categoryId);
    }

    public function create()
    {
        $this->showModal = true;
        $this->category = null;
        $this->categoryId = null;
    }

    public function save()
    {
        $this->validate();

        if (!is_null($this->categoryId)) {
            $this->category->save();
        } else {
            ProductCategory::create($this->category);
        }
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($categoryId)
    {
        $category = ProductCategory::find($categoryId);
        if ($category) {
            $category->delete();
        }
    }
}
