<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'price',
        'product_code',
        'categories_id',
        'description',
        'photo'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

}
