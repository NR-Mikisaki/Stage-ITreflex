<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $SubcategoryClothing = [
            'Tops',
            'Dresses',
            'Pants',
            'Denim',
            'Sweaters',
            'T-Shirts',
            'Jackets',
            'Activewear',
        ];
        $SubcategoryAccessories = [
            'Watches',
            'Wallets',
            'Bags',
            'Sunglasses',
            'Hats',
            'Belts'
        ];
        $SubcategoryBrands = [
            'Full Nelson',
            'My Way',
            'Re-Arranged',
            'Counterfeit',
            'Significant Other'
        ];

        $Categories = [
            'Clothing',
            'Accessories',
            'Brands'
        ];
        $products = [
            'JJ_Tshirt' => [
                [
                    'name' => 'Jack and Jones T-shirt',
                    'price' => 49.99,
                    'subcategory_id'=>6
                ]
            ],
            'Brown_shorts' => [
                [
                    'name' => 'Brown Shorts',
                    'price' => 22.99,
                    'subcategory_id'=>3
                ]
            ],
            'Cool_glasses' =>[
                [
                    'name' =>'Gucci glasses',
                    'price' => 299.99,
                    'subcategory_id'=>12
                ]
            ]

        ];
        foreach ($Categories as $CategoryName)
        {
            Category::factory()->create([
                'name'=>$CategoryName
            ]);

        }
        foreach ($products as $productName => $productDetails)
        {
            foreach ($productDetails as $details) {
                Product::factory()->create([
                    'name' => $details['name'],
                    'price' => $details['price'],
                    'subcategory_id'=> $details['subcategory_id']
                ]);
            }
        }


        foreach ($SubcategoryClothing as $ItemName) {
            Subcategory::factory()->create([
                'name' => $ItemName,
                'category_id' => 1,
            ]);

        }
        foreach ($SubcategoryAccessories as $ItemName) {
            Subcategory::factory()->create([
                'name' => $ItemName,
                'category_id' => 2,
            ]);

        }
        foreach ($SubcategoryBrands as $ItemName) {
            Subcategory::factory()->create([
                'name' => $ItemName,
                'category_id' => 3,
            ]);

        }
    }
}

