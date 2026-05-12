<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, 'cat_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id', 'id');
    }
}
