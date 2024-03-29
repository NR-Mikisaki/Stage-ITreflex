<?php
namespace App\Http\Controllers;

use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use function Laravel\Prompts\table;

class productsController extends Controller
{
    public function index(Request $request) : JsonResponse
    {
        $searchquery = $request->query('search');
        $products = Product::query()
        ->where('name', 'like','%'. $searchquery .'%')->get();

        // Return paginated products
        return response()->json($products);
    }


}
