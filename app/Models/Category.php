<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    public $timestamps = false; // We only have created_at in the schema, we'll manage it or let DB handle it.

    protected $fillable = [
        'category_name',
        'category_image'
    ];
}
