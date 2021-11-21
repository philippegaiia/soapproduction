<?php

namespace App\Http\Livewire\Productions;

use App\Models\Formula;
use Livewire\Component;
use App\Models\Production;
use Livewire\WithPagination;

class Index extends Component

{
    use WithPagination;

    public $search = '';
    public $sortField = 'code';
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

    public $formulas;
    public $formulaId;
    public $formulaItems;
    public $productionId;
    public Production $editing;
    protected $queryString = ['sortField', 'sortDirection'];


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
        $this->formulas = Formula::orderBy('code')->get();
        $this->editing = $this->makeBlankProduction();
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

    public function makeBlankProduction()
    {
        return Production::make(['production_date' => now(),
                            'ready_date' =>now(),
                            'status' => 0,
                            'total_oils' => 26,
                            'total_qty' => 0,
                            'cosmecert' => 1,
                            'masterbatch' => 0,
                            'code' => 'T' . time()
                            ]);
    }

    public function create()
    {
        if ($this->editing->getKey()) $this->editing = $this->makeBlankProduction();
        $this->showEditModal = true;
    }

    public function edit(Production $production)
    {
        if ($this->editing->isNot($production)) $this->editing  = $production;
        $this->showEditModal = true;
    }

    public function save()
    {
        // dd($this->editing);
        $this->validate();
        $this->editing->save();
        $this->showEditModal = false;
    }

    public function render()
    {
        return view('livewire.productions.index', [
            'productions' => Production::search('code', $this->search)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10)
        ]);
    }
}


