<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function cooperationRequest()
    {
        return $this->belongsTo(\App\Models\CooperationRequest::class);
    }
}
