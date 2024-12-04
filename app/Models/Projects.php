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
        'catalog_img',
    ];
}
