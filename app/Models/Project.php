<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'thumbnail', 'technologies',
        'github_url', 'linkedin_url', 'live_url', 'featured', 'sort_order'
    ];

    protected $casts = [
        'technologies' => 'array',
        'featured' => 'boolean',
    ];
}
