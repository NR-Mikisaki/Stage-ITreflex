<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $table = 'Subcategories';
    public $incrementing= true;
    public $timestamps = false;
    protected $primaryKey ='id';

    protected $fillable = [
        'name',
        'category_id'
    ];
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
