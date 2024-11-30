<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'author',
        'job',
        'title',
        'cover_img',
        'content',
        'category',
        'likes',
        'published'
    ];

    protected $casts = [
        'published' => 'datetime',
        'likes' => 'integer',
    ];
    
    protected $dates = ['published'];
    
    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class);
    }

}
