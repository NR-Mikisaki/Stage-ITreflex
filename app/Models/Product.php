<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'subcategory_id',
        'price',
        'imagesrc'
    ];
    public function Subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
}
