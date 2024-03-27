<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CartItem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'amount','cart_id','productName','productPrice'
    ];
    public function Cartproducts()
    {
        return $this->hasMany(Product::class);
    }
}
