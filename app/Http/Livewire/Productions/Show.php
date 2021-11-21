<?php

namespace App\Http\Livewire\Productions;

use App\Models\Formula;
use Livewire\Component;
use App\Models\Production;

class Show extends Component
{

    public $showEditModal = false;
    public $formulas;
    public $listingId;

    public $production;

    public $productionId;
    public $totalOils;
    public $total;

    public Production $editing;

    protected function rules() {

        return [
            'editing.formula_id' => 'required',
            'editing.code' => 'required|max:18',
            'editing.production_date_for_editing' => 'required|date',
            'editing.ready_date_for_editing' => 'after_or_equal:editing.production_date_for_editing',
            'editing.status' =>'required|in:'.collect(Production::STATUSES)->keys()->implode(','),
            'editing.infos' => 'nullable|max:500',
            'editing.oil_qty' => 'numeric|min:0|max:200000',
            'editing.total_qty' => 'numeric|min:0|max:200000',
            'editing.masterbatch' => 'required',
            'editing.cosmecert' => 'required',
        ];
    }

    public function mount()
    {
        // dd($production);
        // $production = Production::find($this->productionId);
        $this->formulas = Formula::all();
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


    public function edit(Production $production)
    {
        // if ($this->editing->isNot($order)) $this->editing  = $order;
        $this->editing  = $production;
        $this->showEditModal = true;
    }


    public function save()
    {
        // dd($this->editing);
        $this->validate();
        $this->editing->save();
        $this->production = $this->editing;
        $this->showEditModal = false;
    }



    public function render()
    {
        return view('livewire.productions.show', ['production' => Production::find($this->productionId)]);
    }

}
