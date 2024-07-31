<?php

namespace App\Livewire;

use Livewire\Component;

class DropDownMenu extends Component
{

    public array $options = [];

    public array $selectedOption = ['title' => null, 'value' => null];

    public bool $openDropDown = false;

    public function render()
    {
        return view('livewire.drop-down-menu');
    }


    public function select(string $option): void
    {
        $options = collect($this->options);

        if (!$options->where('value', $option)->isNotEmpty()) {
            return;
        }
        $this->selectedOption = (array)collect($this->options)->where('value', $option)->first();
        $this->openDropDown = false;

        $this->dispatch('updated', value: $option);
    }


}
