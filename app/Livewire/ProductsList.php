<?php

namespace App\Livewire;

use App\Models\Product;
use App\Services\Filters\ProductsFilter;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ProductsList extends Component
{

    public array $filters = [
        'searchTerm' => '',
        'sortBy' => 'a-z'
    ];

    protected $listeners = [
        'filtersChanged' => 'updateProducts',
        'productAdded' => 'search'
    ];

    public $products;


    public function mount()
    {
        $this->search();
    }

    public function render()
    {
        return view('livewire.products-list');
    }


    public function updateProducts($key, string $value)
    {
        $this->filters[$key] = $value;
        $this->search();
    }

    public function search()
    {

        $filter = new  ProductsFilter();
        $query = $filter->init(Product::query(), collect($this->all()));
        $data = $query->get();
        $this->products = $data->all();

    }
}
