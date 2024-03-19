<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'Categories';
    public $incrementing= true;
    public $timestamps = false;
    protected $primaryKey ='id';
    protected $fillable = [
        'name',
        'category_id'
    ];
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
