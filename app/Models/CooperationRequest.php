<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class CooperationRequest extends Model
{
    public function replies()
    {
        return $this->hasMany(\App\Models\Reply::class);
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->ticket = $model->ticket ?? 'IKB' . strtoupper(Str::random(10));
        });
    }

    protected $fillable = [
        'ticket_number', 'first_name', 'last_name', 'email', 'project_name',
        'project_type', 'why_fit', 'expectations', 'social_media',
        'coop_suggestion', 'team_members', 'user_numbers', 'main_country',
        'contact_methods', 'discord_username', 'whatsapp_number', 'instagram_username', 'status'
    ];

    protected $casts = [
        'contact_methods' => 'array',
    ];
}
