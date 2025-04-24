<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CooperationReply extends Model
{
    public function replies()
    {
        return $this->hasMany(CooperationReply::class);
    }
}
