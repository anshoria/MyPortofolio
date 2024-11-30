<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypingTest extends Model
{
    protected $fillable = [
        'name',
        'wpm',
        'accuracy',
        'timeleft',
        'avg_score',
        'language'
    ];

    protected $casts = [
        'wpm' => 'integer',
        'accuracy' => 'integer',
        'timeleft' => 'integer',
        'avg_score' => 'integer',
    ];
}
