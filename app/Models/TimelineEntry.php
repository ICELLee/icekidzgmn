<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelineEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'date', 'image', 'is_public'
    ];

    protected $casts = [
        'date' => 'date',
        'is_public' => 'boolean'
    ];
}
