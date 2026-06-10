<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ['title', 'issuer', 'description', 'image', 'credential_url', 'issued_date', 'sort_order'];

    protected $casts = [
        'issued_date' => 'date',
    ];
}
