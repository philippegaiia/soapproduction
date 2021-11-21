<?php

namespace App\Http\Livewire\Products;

use App\Models\Formula;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductCollection;
use App\Models\ProductSubcategory;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'code';
    public $sortDirection = 'asc';
    public $showEditModal = false;
    // public $showFilters = false;
    // public $filters = [
    //     'status' => '',
    //     'amount-min' => null,
    //     'amount-max' => null,
    //     'date-min' => null,
    //     'date-max' => null
    // ];

    public $productFormulas;
    public $collections;
    public $subcategories;
    public $formulas;

    public Product $editing;

    protected $queryString = ['sortField', 'sortDirection'];

    protected function rules() {

        return [
            'editing.product_subcategory_id' => 'required',
            'editing.product_collection_id' => 'required',
            'editing.code' => 'required|max:18',
            'editing.brand' => 'required|max:18',
            'editing.launch_date_for_editing' => 'nullable',
            'editing.name' => 'required|max:60',
            'editing.essential_oils' => 'required',
            'editing.extracts' => 'required',
            'editing.net_weight' => 'required|min:0|max:2000',
            'editing.active' =>'required|in:'.collect(Product::STATUSES)->keys()->implode(','),
            'editing.gross_weight' => 'required|min:0|max:2000',
            'editing.ean_code' => 'required|max:20',
            'editing.wp_code' => 'required|max:20',
            'editing.infos' => 'nullable|max:500',
            'productFormulas' => 'array',

        ];
    }

    protected $validationAttributes = [
        'productFormulas' => 'Formulas'
    ];

    public function mount(Product $product)
    {
        //
        $this->subcategories = ProductSubcategory::all();
        $this->formulas = Formula::all();
        $this->collections = ProductCollection::all();
        $this->editing = $this->makeBlankOrder();

    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function makeBlankOrder()
    {
        return Product::make([
            'launch_date' => now(),
            'active' => 0,
            'brand' => 'Gaiia',
            'essential_oils' => 0,
            'extracts' => 0,
            'product_collection_id' => 1,
            'product_subcategory_id' => 1,
        ]);
    }


    public function create()
    {
        if ($this->editing->getKey()) $this->editing = $this->makeBlankOrder();

        $this->showEditModal = true;
    }


    public function edit(Product $product)
    {
        if ($this->editing->isNot($product)) $this->editing = $product;
        $this->productFormulas = $this->editing->formulas()->pluck('formula_id');
        // dd($this->productFormulas);
        $this->showEditModal = true;
    }


    public function save()
    {
        // dd($this->editing);
        $this->validate();
        $this->editing->save();
        $this->editing->formulas()->sync($this->productFormulas);
        $this->showEditModal = false;
    }

    public function render()
    {
        return view('livewire.products.index', [
            'products' => Product::search('name', $this->search)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(100),
        ]);
    }
}