<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class productsImage extends Model
{
    use HasFactory;

    protected $table = 'product_image';

    public function products()
    {
       return $this->hasMany(Products::class);
    }
}
