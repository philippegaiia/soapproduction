<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;
use App\Models\Supplier;

class Show extends Component
{

    public $showEditModal = false;
    public $suppliers;

    public $order;

    public $orderId;

    public Order $editing;

    protected function rules() {

        return [
            'editing.supplier_id' => 'required',
            'editing.order_ref' => 'required|max:18',
            'editing.order_date_for_editing' => 'before_or_equal:today',
            'editing.delivery_date_for_editing' => 'after_or_equal:editing.order_date',
            'editing.confirmation_no' => 'nullable|max:20',
            'editing.invoice_no' => 'nullable|max:20',
            'editing.bl_no' => 'nullable|max:20',
            'editing.active' =>'required|in:'.collect(Order::STATUSES)->keys()->implode(','),
            'editing.infos' => 'nullable|max:500',
            'editing.amount' => 'required|numeric|min:0|max:200000',
            'editing.freight' => 'required|numeric|min:0|max:10000',
        ];
    }

    public function mount()
    {
        // $order = Order::find($this->orderId);
        $this->suppliers = Supplier::all();
        // $this->editing = $this->makeBlankOrder();
    }

    // public function makeBlankOrder()
    // {
    //     return Order::make(['order_date' => now(),
    //                         'delivery_date' =>now(),
    //                         'active' => 0,
    //                         'supplier_id' => 1,
    //                         ]);
    // }


    // public function create()
    // {
    //     if ($this->editing->getKey()) $this->editing = $this->makeBlankOrder();
    //     $this->showEditModal = true;
    // }


    public function edit(Order $order)
    {
        // if ($this->editing->isNot($order)) $this->editing  = $order;
        $this->editing  = $order;
        $this->showEditModal = true;
    }


    public function save()
    {
        // dd($this->editing);
        $this->validate();
        $this->editing->save();
        $this->order = $this->editing;
        $this->showEditModal = false;
    }

    public function render(Order $order)
    {
        return view('livewire.orders.show', compact('order'));
    }
}

//  public function render()
//     {
//         return view('livewire.orders.show', [
//             'order' => Order::find($this->orderId)
//         ]);
//     }
