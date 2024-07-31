<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBox extends Component
{

    public string $searchTerm = '';

    public function render()
    {
        return view('livewire.search-box');
    }

    public function updated()
    {
        $this->dispatch('filtersChanged', 'searchTerm', $this->searchTerm);
    }
}
