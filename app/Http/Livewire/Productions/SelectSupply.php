<?php

namespace App\Http\Livewire\Productions;

use App\Models\Supply;
use App\Models\Listing;
use Livewire\Component;
use App\Models\Productionsupply;

class SelectSupply extends Component
{
    public $supplies;
    public $ingredientId;
    public $listings;

    public $selectedListing = NULL;
    public $selectedSupply = NULL;

    public function mount($selectedSupply = null)
    {
        $this->listings = Listing::where('ingredient_id', $this->ingredientId)->get();
        // $this->supplies = Supply::all();
        $this->selectedSupply = $selectedSupply;

        if (!is_null($selectedSupply)) {
            $supply = Supply::with('listing')->find($selectedSupply);
            if($supply){
                $this->supply = Supply::where('listing_id', $supply->listing_id)->get();
                $this->selectedListing = $supply->listing_id;
            }
        }
    }

    public function render()
    {

        return view('livewire.productions.select-supply');
    }

    public function updatedSelectedListing($listing)
    {
        if(!is_null($listing)){
         $this->supplies = Supply::where('listing_id', $listing)->get();
        }
    }

}
