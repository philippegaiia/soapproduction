<?php

namespace App\Http\Livewire\Formulas;

use App\Models\Formula;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'code';
    public $sortDirection = 'asc';
    public $showEditModal = false;

    protected $queryString = ['sortField', 'sortDirection'];

    public function mount()
    {

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

    public function render()
    {
        return view('livewire.formulas.index', [
            'formulas' => Formula::search('name', $this->search)
            ->orSearch('code', $this->search)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10),
        ]);
    }
}
