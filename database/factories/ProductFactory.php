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

        // Get all product images
        $images = Product::all()->pluck('imagesrc')->toArray();

        // Choose a random image from the array
        $randomImage = !empty($images) ? $images[array_rand($images)] : null;

        switch ($randomImage){
            case 'https://images.jackjones.com/12193553/4241403/003/jackjones-slimfitchinobroek-grijs.jpg?v=8f67cee030faf9536c6ba839a86bc6e6&format=webp&width=1280&quality=90&key=25-0-3':
                $color = 'grey';
                $subcategory = 3;
                $categoryid = 1;
                break;
            case 'https://n.nordstrommedia.com/id/sr3/87ad520d-9cb6-4246-9955-3129e226121b.jpeg?h=365&w=240&dpr=2':
                $color = 'brown';
                $subcategory = 3;
                $categoryid = 1;

                break;
            case 'https://images.jackjones.com/12248431/4372306/001/jackjones-effensweatshirtmetrondehals-bruin.jpg?v=97229aa1df2cf0067acd3aa5026a3640&format=webp&width=1280&quality=90&key=25-0-3':
                $color = 'brown';
                 $subcategory = 5;
                $categoryid = 1;

                break;
            case 'https://pretavoir.us/cdn/shop/files/gucci-gg1448o-001-hd-1.jpg?v=1697035144':
            default:
                $color = 'N/A';
            $subcategory = 12;
            $categoryid = 2;

            break;
            case 'https://glitterdesign.be/wp-content/uploads/2023/02/crew-neck-male-tshirt-front-01-blauw-ronde-hals.jpg':
                $color = 'blue';
                $subcategory = 6;
                $categoryid = 1;
                break;

        }

        return [
            'name' => fake()->name(),
            'price' => random_int(10,130)+0.99,
            'imagesrc' => $randomImage ?: Str::random(),
            'subcategory_id' => $subcategory,
            'color'=>$color,
            'category_id'=>$categoryid
        ];
    }
}
