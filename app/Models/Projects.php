<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'url',
        'image',
        'year',
        'is_featured',
        'is_catalog',
        'price',
        'discount_percentage',
        'final_price',
        'is_cta',
        'catalog_img',
    ];
}
