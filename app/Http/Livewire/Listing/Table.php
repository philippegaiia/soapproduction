<?php

namespace App\Http\Livewire\Listing;

use App\Models\Listing;
use Livewire\Component;
use Livewire\withPagination;

class Table extends Component
{
    use withPagination;

    public $search = '';
    public $perPage = 25;
    public $sortField = 'name';
    public $sortAsc = true;
    public $selected = [];

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.listing.table', [
            'listings' => Listing::search($this->search)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage)
        ]);
    }
}
