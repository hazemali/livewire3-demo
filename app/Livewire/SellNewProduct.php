<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class SellNewProduct extends Component
{

    use WithFileUploads;

    public bool $modalIsOpen = false;

    public $image_cover;

    public string $title = '';
    public string $description = '';
    public int $category_id;

    public float $price;

    public array $categories;

    protected $listeners = [
        'openModal' => 'openModal'
    ];


    public function mount()
    {
        $this->categories = Category::all()
            ->map(fn($category) => (['title' => $category->name, 'value' => $category->id]))->toArray();
    }

    public function render()
    {
        return view('livewire.sell-new-product');
    }

    public function updateCategory($value)
    {
        $this->category_id = $value;
    }

    public function updated()
    {
        $this->validate([
            'image_cover' => 'nullable|image|max:1024',
            'title' => 'nullable|string|min:3|max:60',
            'price' => 'nullable|numeric|min:1',
//            'description' => 'nullable|string|min:3|max:1024',
            'category_id' => ['nullable', Rule::exists('categories', 'id')]
        ]);
    }

    public function save()
    {
        $this->validate([
            'image_cover' => 'required|image|max:1024',
            'title' => 'required|string|min:3|max:60',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string|min:3|max:250',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);


        Product::create([
            'image_cover' => '/storage/' . $this->image_cover->store('images', 'public'),
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'price' => $this->price
        ]);

        $this->reset();
        $this->dispatch('productAdded');
        $this->closeModal();
    }

    public function openModal()
    {
        $this->modalIsOpen = true;
    }

    public function closeModal()
    {
        $this->modalIsOpen = false;
    }
}
