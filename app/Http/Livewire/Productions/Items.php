<?php

namespace App\Http\Livewire\Productions;

use App\Models\Listing;
use Livewire\Component;
use App\Models\Ingredient;
use App\Models\Production;
use App\Models\FormulaItem;
use App\Models\ProductionItem;
use Illuminate\Support\Facades\DB;

class Items extends Component
{
    public $search = '';
    public $sortField = 'phase';
    public $sortDirection = 'asc';
    public $showEditModal = false;
    public $selectedSupply;

    public $production;
    public $oilQty;


    public $listings;
    public $duplicate;

    // public $ingredientId;
    public $productionId;

    public ProductionItem $editing;

    protected $queryString = ['sortField', 'sortDirection'];

    protected function rules() {

        return [
            'editing.ingredient_id' => 'required',
            'editing.supply_id' => 'nullable',
            'editing.percentoils_real' => 'required|numeric|min:0|max:100',
            'editing.percenttotal_real' => 'required|numeric|min:0|max:100',
            'editing.organic' => 'required',
            'editing.phase' => 'required',
        ];
    }

    public function mount()
    {
        // $this->listings = Listing::all();
        // $this->listings = Listing::where('ingredient_id', $this->ingredientId)->get();
        // dd($this->listings);
        // $this->listings = Listing::where('ingredient_id', $this->ingredientId);
        $this->editing = $this->makeBlankSupply();
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

    public function makeBlankSupply()
    {
        return ProductionItem::make([
            'organic' => 0,
            'phase' => 0,
            'production_id' => $this->productionId,
        ]);
    }


    public function create()
    {
        if ($this->editing->getKey()) $this->editing = $this->makeBlankSupply();
        // dd($this->editing);
        $this->showEditModal = true;
    }


    public function edit(ProductionItem $item)
    {
        // $this->ingredientId = $item->ingredient_id;
        // dd($this->ingredientId);
        // $this->listings = Listing::where('ingredient_id', $this->ingredientId)->get();
        // dd($this->listings);

        // $listings = DB::table('listings')
        //             ->select('id')
        //             ->where('ingredient_id', $this->ingredientId)
        //             ->get();


        // $supplies = DB::table('supplies')
        //             ->joinSub($listings, 'listings', function($join){
        //                 $join->on('listings.id', '=', 'supplies.listing_id');
        //             })->get;
        // dd($supplies);
        // $supplies = db::table('supplies')
        //             ->rightOuterjoin('listings', 'supplies.listing_id', '=', 'listings.id')->where('ingredient_id', $this->ingredientId)
        //             ->get();

        // $listings = db::table('listings')
        //
        //             ->rightJoin('supplies', 'supplies.listing_id', '=', 'listings.id')
        //             ->get();

        // $supplies = DB:table('supplies')->rightJoin('')

        if ($this->editing->isNot($item)) $this->editing = $item;
        // dd($this->editing);
        $this->showEditModal = true;
    }


    public function save()
    {

        $this->validate();
        // $this->editing['supply_id'] = $this->selectedSupply;
        $this->editing->save();
        $this->showEditModal = false;
    }

    public function duplicate(ProductionItem $item)
    {
        $this->duplicate = $item->replicate();
        $this->duplicate->save();
    }

    public function createItems($id, $formula_id)
    {
        $formulaItems = FormulaItem::where('formula_id', $formula_id)
                ->select('ingredient_id','percentoils_dip','percentoils_real','percenttotal_dip','percenttotal_real','organic','phase')
                ->get();

        foreach($formulaItems as $formulaItem){

            $item = new ProductionItem([
                'production_id' => $id,
                'ingredient_id' => $formulaItem->ingredient_id,
                'percentoils_dip'  => $formulaItem->percentoils_dip,
                'percentoils_real'  => $formulaItem->percentoils_real,
                'percenttotal_dip'  => $formulaItem->percenttotal_dip,
                'percenttotal_real'  => $formulaItem->percenttotal_real,
                'organic'  => $formulaItem->organic,
                'phase'  => $formulaItem->phase,
            ]);

            $production = Production::find($id);

            $production->production_items()->save($item);
        }

    }

    public function delete($id)
    {
        $item = ProductionItem::findOrFail($id);
        $item->delete();
    }

    // public function sumOils()
    // {
    //     $oils = ProductionItem::where('phase', '=',  'Saponification')->where('production_id', $this->productionId)->get();
    //     $oils->oils->sum('percentoils_real');
    //     return $oils;
    // }

    public function render()
    {
        $totalOils = ProductionItem::where('phase', '=',  'Saponification')->where('production_id', $this->productionId)->get();
        $totalOils = $totalOils->sum('percentoils_real');
        // $totoil = $this->totalOils;
        $total = ProductionItem::where('production_id', $this->productionId)->get();
        $total = $total->sum('percenttotal_real');

        return view('livewire.productions.items', [
            'items' => ProductionItem::where('production_id', $this->productionId)
            ->orderBy($this->sortField, $this->sortDirection)
            ->get(),
            'totalOils' => $totalOils,
            'total' => $total
        ]);
    }
}
