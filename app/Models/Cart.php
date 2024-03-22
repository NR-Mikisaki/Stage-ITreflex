<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart
{
    use HasFactory;
    protected $table = 'cart';
    public $timestamps = false;
    protected $fillable = [
        'totalPrice',
        'user_id'
    ];
    public function CartItem()
    {
        return $this->hasMany(CartItem::class);
    }
}
