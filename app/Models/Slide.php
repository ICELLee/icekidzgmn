<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
// In Slide.php
    protected $fillable = ['title', 'description', 'button', 'link', 'image', 'is_active', 'page'];
}
