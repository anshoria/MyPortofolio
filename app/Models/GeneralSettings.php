<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    protected $fillable = [
        'logo',
        'cv',
        'github',
        'linkedin',
        'instagram',
        'x',
        'tiktok',
        'youtube'
    ];
}
