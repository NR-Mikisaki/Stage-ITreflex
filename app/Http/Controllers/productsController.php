<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Inertia\Inertia;
use function Termwind\render;


class productsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }
}
