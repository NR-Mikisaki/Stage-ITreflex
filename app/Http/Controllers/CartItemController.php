<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartItemController extends Controller
{

    public function index(){
        $ProductName = DB::table('products')
            ->join('cart_items', 'products.id ', '=', 'cart_items.product_id')// joining the contacts table , where user_id and contact_user_id are same
            ->select('cart_items.*', 'products.name')
            ->get();

        return $ProductName;

    }
}
