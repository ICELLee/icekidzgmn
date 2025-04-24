<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Server extends Model
{
    use HasFactory;

    protected $fillable = ['server_id', 'name', 'ip', 'mode', 'status', 'maintenance_reason', 'uptime', 'last_checked_at'];


    protected $casts = [
        'last_checked_at' => 'datetime',
        'last_online_at' => 'datetime'
    ];
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'online' => 'bg-green-500',
            'offline' => 'bg-red-500',
            'error' => 'bg-orange-500',
            'maintenance' => 'bg-purple-500',
            default => 'bg-gray-500',
        };
        $created = $this->created_at;
        $lastChecked = $this->last_checked_at ?? now();
        $total = $created->diffInMinutes($lastChecked);
        return $total > 0 && $this->status === 'online'
            ? round(($total / $total) * 100, 2)
            : 0;
    }
}
