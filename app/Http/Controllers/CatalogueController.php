<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Inertia\Inertia;

class CatalogueController extends Controller
{
    public function index()
    {





        return Inertia::render('Catalogue', [
            'products' => Product::query()
                ->select(
                    'products.id',
                    'products.imagesrc',
                    'products.name',
                    'products.price',
                    'products.subcategory_id',
                    'products.color',
                    'subcategories.name as category_name',
                    'subcategories.id as category_id'
                )
                ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
                ->orderBy('products.id')
                ->paginate(64)
                ->onEachSide(1)
        ]);
    }
}
