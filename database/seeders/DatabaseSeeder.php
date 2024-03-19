<?php

namespace Database\Seeders;

use App\Models\Category;
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

        foreach ($Categories as $CategoryName)
        {
            Category::factory()->create([
                'name'=>$CategoryName
            ]);

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

