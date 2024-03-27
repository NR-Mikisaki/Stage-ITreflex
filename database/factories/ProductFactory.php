<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get all Subcategory IDs
        $subcategoryIds = Subcategory::all()->pluck('id')->toArray();

        // Choose a random Subcategory ID from the array
        $randomSubCategoryId = !empty($subcategoryIds) ? $subcategoryIds[array_rand($subcategoryIds)] : null;

        // Get all product images
        $images = Product::all()->pluck('imagesrc')->toArray();

        // Choose a random image from the array
        $randomImage = !empty($images) ? $images[array_rand($images)] : null;

        return [
            'name' => fake()->name(),
            'price' => random_int(10,130),
            'imagesrc' => $randomImage ?: Str::random(),
            'subcategory_id' => $randomSubCategoryId
        ];
    }
}
