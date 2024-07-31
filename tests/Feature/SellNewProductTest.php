<?php

namespace Tests\Feature;

use App\Livewire\SellNewProduct;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SellNewProductTest extends TestCase
{
    use RefreshDatabase;


    public function test_product_creation()
    {
        $category = Category::factory()->create();

        Storage::fake('public');

        $imageCover = UploadedFile::fake()->image('image_cover.jpg');

        Livewire::test(SellNewProduct::class)
            ->set('image_cover', $imageCover)
            ->set('title', 'My Product')
            ->set('description', 'Product Description')
            ->set('price', 10)
            ->set('category_id', $category->id)
            ->call('save');

        // Assert a file was stored...
        Storage::disk('public')->assertExists('images/'.$imageCover->hashName());

        // Assert product is added to the database
        $this->assertDatabaseHas('products', [
            'title' => 'My Product',
            'description' => 'Product Description',
            'price' => 10,
            'category_id' => $category->id
        ]);
    }


    public function test_input_validation()
    {
        Storage::fake('public');

        $imageCover = UploadedFile::fake()->image('image_cover.jpg');

        Livewire::test(SellNewProduct::class)
            ->set('image_cover', $imageCover)
            ->set('title', '')
            ->set('description', '')
            ->set('price', '')
            ->set('category_id', '')
            ->call('save')
            ->assertHasErrors(['title', 'description', 'price', 'category_id']);

        Livewire::test(SellNewProduct::class)
            ->set('image_cover', $imageCover)
            ->set('title', 'My Product')
            ->set('description', str_repeat('a', 501))
            ->set('price', -1)
            ->set('category_id', 10000)
            ->call('save')
            ->assertHasErrors(['description', 'price', 'category_id']);
    }


    public function test_open_and_close_modal_methods()
    {
        Livewire::test(SellNewProduct::class)
            ->call('openModal')
            ->assertSet('modalIsOpen', true)
            ->call('closeModal')
            ->assertSet('modalIsOpen', false);
    }

}
