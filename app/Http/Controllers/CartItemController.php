<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartItemController extends Controller
{
    public function destroy(CartItem $cartItem){
        info('hello');
        $cartItem->delete();
    }
}
