<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'discord_name', 'private_email',
        'assigned_email', 'team_number', 'profile_image', 'note',
        'role', 'ingame_name', 'position', 'is_active',
        'show_on_home', 'show_on_team',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_on_home' => 'boolean',
        'show_on_team' => 'boolean',
    ];



    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getRoleColorAttribute()
    {
        return match($this->role) {
            'IKRIPL' => 'bg-purple-500 text-white',
            'IKRIPM' => 'bg-red-500 text-white',
            'IKRIS' => 'bg-yellow-500 text-black',
            'IKRID' => 'bg-blue-500 text-white',
            'IKRIF' => 'bg-blue-400 text-white',
            'IKRESI' => 'bg-pink-300 text-white',
            default => 'bg-gray-500 text-white',
        };
    }

    public function getRoleNameAttribute()
    {
        return match($this->role) {
            'IKRIPL' => 'ICEKIDZ Projekt Leitung',
            'IKRIPM' => 'ICEKIDZ Managment',
            'IKRIS' => 'ICEKIDZ Support',
            'IKRID' => 'ICEKIDZ Developer',
            'IKRIF' => 'ICEKIDZ Friend',
            'IKRESI' => 'Server Inhaber',
            default => 'Unknown Role',
        };
    }
}
