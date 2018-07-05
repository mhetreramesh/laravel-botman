<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Item extends Model
{
    protected $fillable = ['name', 'price', 'sku', 'ean', 'quantity'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'item_categories', 'item_id', 'category_id');
    }
}
