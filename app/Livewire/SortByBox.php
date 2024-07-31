<?php

namespace App\Livewire;

use Livewire\Component;

class SortByBox extends Component
{

    public array $options = [
        ['value' => 'a-z', 'title' => 'A - Z'],
        ['value' => 'z-a', 'title' => 'Z - A'],
        ['value' => 'price-asc', 'title' => 'Price: Low to High'],
        ['value' => 'price-desc', 'title' => 'Price: High to Low']
    ];

    public array $selectedOption = ['title' => null, 'value' => null];

    public bool$openDropDown = false;


    public function mount()
    {
        $this->selectedOption = $this->options[2];

    }

    public function render()
    {
        return view('livewire.sort-by-box');
    }

    public function select(string $option): void
    {
        $options = collect($this->options);

        if(!$options->where('value', $option)->isNotEmpty()){
            return;
        }
        $this->selectedOption = (array) collect($this->options)->where('value', $option)->first();
        $this->openDropDown = false;
        $this->dispatch('filtersChanged', 'sortBy' , $option);
    }
}
