<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartItemController extends Controller
{

    public function index(){
        $ProductPrice = DB::table('products')
            ->join('cart_items', 'products.id ', '=', 'cart_items.product_id')// joining the contacts table , where user_id and contact_user_id are same
            ->select('cart_items.*', 'products.price')
            ->get();

        return $ProductPrice;

    }
    public function destroy(CartItem $cartItem){
        $cartItem->delete();
    }
}
