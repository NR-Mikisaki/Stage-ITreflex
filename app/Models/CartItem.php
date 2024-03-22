<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'amount','product_id'
    ];
}
