<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class FilterBox extends Component
{

    public array $categories = [];

    public function mount()
    {
        $this->categories = Category::all()
            ->map(fn($category) => (['title' => $category->name, 'value' => $category->id]))->toArray();
    }


    public function render()
    {
        return view('livewire.filter-box');
    }


}
