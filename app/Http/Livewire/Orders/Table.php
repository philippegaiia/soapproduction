<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'order_ref';
    public $sortDirection = 'asc';
    public $showEditModal = false;
    public $showFilters = false;
    public $filters = [
        'status' => '',
        'amount-min' => null,
        'amount-max' => null,
        'date-min' => null,
        'date-max' => null
    ];

    public $suppliers;

    public Order $editing;

    protected $queryString = ['sortField', 'sortDirection'];

    protected function rules() {

        return [
            'editing.supplier_id' => 'required',
            'editing.order_ref' => 'required|max:18',
            'editing.order_date_for_editing' => 'before_or_equal:today',
            'editing.delivery_date_for_editing' => 'after_or_equal:editing.order_date_for_editing',
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
        $this->suppliers = Supplier::all();
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
        return Order::make(['order_date' => now(),
                            'delivery_date' =>now(),
                            'active' => 0,
                            // 'supplier_id' => 1,
                            'order_ref' => time()
                            ]);
    }


    public function create()
    {
        if ($this->editing->getKey()) $this->editing = $this->makeBlankOrder();
        $this->showEditModal = true;
    }


    public function edit(Order $order)
    {
        if ($this->editing->isNot($order)) $this->editing = $order;
        $this->showEditModal = true;
    }


    public function save()
    {
        $this->validate();
        $this->editing->save();
        $this->showEditModal = false;
    }

    public function render()
    {
        return view('livewire.orders.table', [
            'orders' => Order::search('order_ref', $this->search)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(100),
        ]);
    }
}
