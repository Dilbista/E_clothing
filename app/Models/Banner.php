<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
     protected $fillable = [
        'title',
        'image',
        'position',
        'link',
        'description',
        'status',
        'order'
    ];
 // Tell Laravel to serialize the accessor with model outputs
    protected $appends = ['image_url'];

    // Accessor to generate the asset storage path
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
