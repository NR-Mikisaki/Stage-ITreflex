<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
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
                    'subcategory_id'=>6,
                    'imagesrc'=>'https://glitterdesign.be/wp-content/uploads/2023/02/crew-neck-male-tshirt-front-01-blauw-ronde-hals.jpg',
                    'color'=>'blue',
                    'category_id'=>'1',
                ]
            ],
            'Brown_shorts' => [
                [
                    'name' => 'Brown Shorts',
                    'price' => 22.99,
                    'subcategory_id'=>3,
                    'imagesrc'=>'https://n.nordstrommedia.com/id/sr3/87ad520d-9cb6-4246-9955-3129e226121b.jpeg?h=365&w=240&dpr=2',
                    'color'=>'brown',
                    'category_id'=>'1',
                ]
            ],
            'Cool_glasses' =>[
                [
                    'name' =>'Gucci glasses',
                    'price' => 299.99,
                    'subcategory_id'=>12,
                    'imagesrc'=>'https://pretavoir.us/cdn/shop/files/gucci-gg1448o-001-hd-1.jpg?v=1697035144',
                    'color'=>'N/A',
                    'category_id' =>2,
                ]
            ],
            'JJ_Trousers'=>[
                [
                    'name'=>'Jack and Jones trousers',
                    'price'=>69.99,
                    'subcategory_id'=>3,
                    'imagesrc'=>'https://images.jackjones.com/12193553/4241403/003/jackjones-slimfitchinobroek-grijs.jpg?v=8f67cee030faf9536c6ba839a86bc6e6&format=webp&width=1280&quality=90&key=25-0-3',
                    'color'=>'grey',
                    'category_id'=>1,
                    ]
            ],
            'JJ_Sweater'=>[
                [
                    'name'=>'Jack and Jones sweater',
                    'price'=>119.99,
                    'subcategory_id'=>5,
                    'imagesrc'=>'https://images.jackjones.com/12248431/4372306/001/jackjones-effensweatshirtmetrondehals-bruin.jpg?v=97229aa1df2cf0067acd3aa5026a3640&format=webp&width=1280&quality=90&key=25-0-3',
                    'color'=> 'brown',
                    'category_id'=>1
                ]
            ]

        ];
        $carts = [
            'cart_1'=>[
                [
                    'totalPrice'=>10,
                    'user_id'=>1,
                ]
            ],
            'cart_2'=>[
        [
            'totalPrice'=>9,
            'user_id'=>1,
        ]
                ],
            'cart_3'=>[
                [
                    'totalPrice'=>14,
                    'user_id'=>2,
                ]
            ]


        ];
        $users =[
            'user1'=>[[
                'name'=>'koen',
                'email'=>'koen@koen.be',
                'password'=>'koenkoen'
            ]],
            'user2'=>[[
                'name'=>'patje',
                'email'=>'patje@patje.be',
                'password'=>'patjepatje'
            ]]
        ];
        $cartitems=[
            'cartitem1'=>[[
                'amount'=>2,
                'cart_id'=>1,
                'productName'=>'Jack and Jones T-shirt',
                'productPrice'=>49.99

            ]],
            'cartitem2'=>[[
                'amount'=>1,
                'cart_id'=>2,
                'productName'=>'Brown Shorts',
                'productPrice'=>22.99

            ]],
            'cartitem3'=>[[
                'amount'=>2,
                'cart_id'=>3,
                'productName'=>'Jack and Jones Trousers',
                'productPrice'=>69.99

            ]],
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
        foreach ($products as $productName => $productDetails)
        {
            foreach ($productDetails as $details) {
                Product::factory()->create([
                    'name' => $details['name'],
                    'price' => $details['price'],
                    'subcategory_id'=> $details['subcategory_id'],
                    'category_id'=>$details['category_id'],
                    'imagesrc'=>$details['imagesrc'],
                    'color'=>$details['color'],
                ]);
            }
        }
        Product::factory()
            ->count(500)
            ->create();
        foreach ($users as $username=> $userdetails){
            foreach ($userdetails as $details) {
                User::factory()->create([
                    'name' => $details['name'],
                    'email'=>$details['email'],
                    'password'=>$details['password']
            ]);
            }
        }
        User::factory()
            ->count(50)
            ->create();
        foreach ($carts as $cartname => $cartdetails)
        {
            foreach ($cartdetails as $details){
                Cart::factory()->create([
                    'totalPrice'=>$details['totalPrice'],
                    'user_id'=>$details['user_id']
                ]);
            }
        }
        foreach ($cartitems as $cartitemname =>$cartitemdetails){
            foreach ($cartitemdetails as $details){
                CartItem::factory()->create([
                'amount'=>$details['amount'],
                'cart_id'=>$details['cart_id'],
                    'productName'=>$details['productName'],
                    'productPrice'=>$details['productPrice'],
                ]);
            }
        }
    }
}

