<?php

namespace Tests\Feature;

use App\Livewire\ProductsList;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

final class ProductsListTest extends TestCase
{
    use RefreshDatabase;


    public function test_mount_method_initializes_products()
    {
        $product = Product::factory()->create(['title' => 'Test Product']);

        $livewire = Livewire::test(ProductsList::class);

        $products = $livewire->get('products');

        $this->assertEquals($product->toArray(), $products[0]->toArray());
    }

    public function test_update_product_filters_updates_products()
    {
        $productA = Product::factory()->create(['title' => 'Apple']);
        $productB = Product::factory()->create(['title' => 'Banana']);

        Livewire::test(ProductsList::class)
            ->set('filters.sortBy', 'z-a') // Alternative sorting
            ->call('updateProducts', 'sortBy', 'z-a')
            ->assertSet('products', [$productB->fresh(), $productA->fresh()]);
    }

    public function test_invalid_filter_key_does_not_change_anything()
    {
        $product = Product::factory()->create();

        $products = Livewire::test(ProductsList::class)
            ->call('updateProducts', 'invalidKey', 'some-value')
            ->get('products.0');

        $this->assertEquals($products->toArray(), $product->fresh()->toArray(), 'Invalid filter key should not affect the products list');

    }
}
