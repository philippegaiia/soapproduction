<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\ProductCollection;

class Collections extends Component
{
    public $showModal = false;
    public $collectionId;
    public $collection;

    protected $rules = [
        'collection.code' => 'max:10',
        'collection.name' => 'required',
        'collection.active' => 'required',
    ];

    public function render()
    {
        return view('livewire.products.collections', [
            'collections' => ProductCollection::all()
        ]);
    }

    public function edit($collectionId)
    {
        $this->showModal = true;
        $this->collectionId = $collectionId;
        $this->collection = ProductCollection::find($collectionId);
    }

    public function create()
    {
        $this->showModal = true;
        $this->collection = null;
        $this->collectionId = null;
    }

    public function save()
    {
        $this->validate();

        if (!is_null($this->collectionId)) {
            $this->collection->save();
        } else {
            ProductCollection::create($this->collection);
        }
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($collectionId)
    {
        $collection = ProductCollection::find($collectionId);
        if ($collection) {
            $collection->delete();
        }
    }

}
