<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'template_id',
        'name',
        'email',
        'phone',
        'business_name',
        'notes',
        'status',
    ];

    public function template(): BelongsTo
    {
        return $this->belongsTo(Projects::class, 'template_id');
    }
}
