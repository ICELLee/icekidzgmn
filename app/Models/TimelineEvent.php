<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimelineEvent extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'color',
        'icon',
        'image',
    ];
}
