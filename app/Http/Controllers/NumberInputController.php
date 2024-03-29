<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumberInputController extends Controller
{
    public function value($value){
        $value->get();
    }
}
