<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comments extends Model
{
    
    protected $fillable = [
        'blog_id',
        'parent_id',
        'name',
        'comment',
        'like'
    ];
    
    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
     // Untuk mendapatkan balasan dari sebuah komentar (one-to-many)
     public function replies(): HasMany
     {
         return $this->hasMany(Comments::class, 'parent_id');
     }
 
     // Untuk mendapatkan komentar induk dari sebuah balasan (many-to-one)
     public function parent(): BelongsTo
     {
         return $this->belongsTo(Comments::class, 'parent_id');
     }
}
