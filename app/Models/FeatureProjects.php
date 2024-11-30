<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureProjects extends Model
{
    protected $fillable = [
        'title',
        'description',
        'url',
        'category',
        'year',
        'image'
    ];

    // Tidak perlu cast year sebagai date
    protected $casts = [];
}