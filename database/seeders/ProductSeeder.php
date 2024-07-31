<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Database\Factories\ProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Category::query()->truncate();

        $categories = [
            ['name' => "Men's wares"],
            ['name' => "Women's wares"]
        ];
        $categories = Category::factory()->createMany($categories);


        $products = [
            [
                'title' => 'Black overalls',
                'price' => 36.4,
                'image_cover' => '/images/model1.png',
                'description' => 'Black overalls',
                'category_id' => 2
            ],
            [
                'title' => 'Brown sweet shirt',
                'price' => 30.0,
                'image_cover' => '/images/model3.png',
                'description' => 'Brown sweet shirt',
                'category_id' => 2
            ],
            [
                'title' => 'White jacket',
                'price' => 55.5,
                'image_cover' => '/images/model2.png',
                'description' => 'White jacket',
                'category_id' => 1
            ],   [
                'title' => 'Black jacket',
                'price' => 120.0,
                'image_cover' => '/images/black-jacket.png',
                'description' => 'Black jacket',
                'category_id' => 1
            ],
        ];


        Product::factory()->createMany($products);

    }
}
