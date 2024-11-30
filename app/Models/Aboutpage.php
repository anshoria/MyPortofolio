<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aboutpage extends Model
{
    protected $fillable = [
        'image',
        'description',
        'experience',
        'projects',
        'satisfaction',
        'support'
    ];
}
