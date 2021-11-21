<?php

namespace App\Http\Livewire\Supply;

use App\Models\Order;
use App\Models\Supply;
use App\Models\Listing;
use Livewire\Component;

class AddSupply extends Component
{

    public $listings;

    public $supplierId;

    public $orderId;

    public $showEditModal = false;

    public Order $order;

    public Supply $editing;

    // protected $queryString = ['sortField', 'sortDirection'];

    protected function rules() {

        return [
            'editing.order_id' => 'required',
            'editing.listing_id' => 'required',
            'editing.expiry_date_for_editing' => 'date',
            'editing.batch_no' => 'nullable|max:20',
            'editing.price' => 'nullable|max:20',
            'editing.qty' => 'required|numeric|min:0|max:10000',
            'editing.active' =>'required',
        ];
    }

    public function mount()
    {

        $this->listings = Listing::where('supplier_id', $this->supplierId)->get();
        // dd($this->listings);
        // $this->supplies = Supply::where('order_id', $this->orderId)->get();
        $this->editing = $this->makeBlankSupply();
        // dd($this->supplies);
    }

    // public function sortBy($field)
    // {
    //     if ($this->sortField === $field) {
    //         $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    //     } else {
    //         $this->sortDirection = 'asc';
    //     }

    //     $this->sortField = $field;
    // }

    public function makeBlankSupply()
    {
        return Supply::make([
                            'order_id' => $this->orderId,
                            // 'listing_id' => 1,
                            'expiry_date' =>now(),
                            'active' => 0
                            ]);
    }


    public function create()
    {
        if ($this->editing->getKey()) $this->editing = $this->makeBlankSupply();
        $this->showEditModal = true;
    }


    public function edit(Supply $supply)
    {
        if ($this->editing->isNot($supply)) $this->editing  = $supply;
        $this->showEditModal = true;
    }


    public function save()
    {
        // dd($this->editing);
        $this->validate();
        $this->editing->save();
        $this->showEditModal = false;
    }

    // public function render()
    // {
    //     return view('livewire.orders.table', [
    //         'orders' => Order::search('order_ref', $this->search)
    //         ->orderBy($this->sortField, $this->sortDirection)
    //         ->paginate(10),
    //     ]);
    // }
    public function render()
    {
        $supplies = Supply::where('order_id', $this->orderId)->get();

        return view('livewire.supply.add-supply', compact('supplies'));
        // ,

    }
}
