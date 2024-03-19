<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $subCategoriesClothing = [
            'Tops',
            'Dresses',
            'Pants',
            'Denim',
            'Sweaters',
            'T-Shirts',
            'Jackets',
            'Activewear',
        ];
        $subCategoriesAccessories = [
            'Watches',
            'Wallets',
            'Bags',
            'Sunglasses',
            'Hats',
            'Belts'
        ];
        $subCategoriesBrands = [
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
                'name' => $CategoryName
            ]);
        }

        foreach ($subCategoriesClothing as $subCategoryName) {
            SubCategory::factory()->create([
                'name' => $subCategoryName,
                'category_id' => 1,
            ]);

        }
        foreach ($subCategoriesAccessories as $subCategoryName) {
            SubCategory::factory()->create([
                'name' => $subCategoryName,
                'category_id' => 2,
            ]);

        }
        foreach ($subCategoriesBrands as $subCategoryName) {
            SubCategory::factory()->create([
                'name' => $subCategoryName,
                'category_id' => 3,
            ]);

        }
    }
}

