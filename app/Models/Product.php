<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'category_id', 'brand_id', 'price', 
        'discount_price', 'stock', 'description', 
        'image', 'status'
    ];

    public function category()
{
    return $this->belongsTo(Category::class, 'category_id', 'category_id');
}

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
}
