<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name', 'percentage', 'icon', 'sort_order'];

    public static function ordered()
    {
        return static::orderBy('sort_order')->orderBy('name');
    }
}
